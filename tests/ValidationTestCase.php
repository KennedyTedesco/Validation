<?php

namespace Tests;

use Orchestra\Testbench\TestCase;
use KennedyTedesco\Validation\ValidationServiceProvider;

abstract class ValidationTestCase extends TestCase
{
    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [ValidationServiceProvider::class];
    }

    /**
     * @param array $data
     * @param array $rules
     * @param array $messages
     * @return mixed
     */
    protected function validate(array $data, array $rules, array $messages = [])
    {
        return $this->app->make('validator')->make($data, $rules, $messages);
    }
}
