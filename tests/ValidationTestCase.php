<?php

use KennedyTedesco\Validation\ValidationServiceProvider;
use Illuminate\Foundation\Application;

abstract class ValidationTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @return Illuminate\Foundation\Application
     */
    protected function setupApplication()
    {
        return new Application();
    }

    /**
     * @param Application $app
     *
     * @return KennedyTedesco\Validation\ValidationServiceProvider
     */
    protected function setupServiceProvider(Application $app)
    {
        $provider = new ValidationServiceProvider($app);
        $app->register($provider);
        $provider->boot();
        return $provider;
    }
}
