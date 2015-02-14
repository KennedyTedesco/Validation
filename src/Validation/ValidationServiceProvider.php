<?php
namespace KennedyTedesco\Validation;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator as BaseValidator;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        BaseValidator::resolver(function($translator, $data, $rules, $messages) {
            return new Validator($translator, $data, $rules, $messages);
        });
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
