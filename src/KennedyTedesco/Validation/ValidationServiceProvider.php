<?php
namespace KennedyTedesco\Validation;

use Illuminate\Support\ServiceProvider;
use Validator;

class ValidationServiceProvider extends ServiceProvider
{    
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Register Respect Rules
        $namespace = 'KennedyTedesco\\Validation\\Respect\Validator';
        $rules = $this->getAllRespectRules();
        foreach($rules as $index => $rule) {
            $ruleMethod = (!is_int($index)) ? $index : $rule;
            Validator::extend($ruleMethod, "{$namespace}@{$rule}");
        }
     }
     
    /**
     * Merges all the arrays of rules
     *
     * @return array
     */
     protected function getAllRespectRules()
     {
        $rules = array();
        $files = new \FilesystemIterator(__DIR__ . '/Respect/Rules');
        foreach ($files as $file) {
           if ($file->isFile()) {
               $rules = array_merge($rules, require $file->getPathname());
           }
        }
        return array_unique($rules);
     }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}