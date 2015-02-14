<?php

use Illuminate\Contracts\Foundation\Application;
use Orchestra\Testbench\TestCase;

abstract class ValidationTestCase extends TestCase
{
    protected function getPackageProviders(Application $app)
    {
        return [
            'KennedyTedesco\Validation\ValidationServiceProvider'
        ];
    }

    protected function validate(array $data, array $rules)
    {
        return $this->app->make('validator')->make($data, $rules);
    }
}
