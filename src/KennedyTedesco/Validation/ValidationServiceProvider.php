<?php
namespace KennedyTedesco\Validation;

class ValidationServiceProvider extends \Illuminate\Support\ServiceProvider
{   
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {        
        \Validator::resolver(function($translator, $data, $rules, $messages) {
            return new CustomValidator($translator, $data, $rules, $messages);
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