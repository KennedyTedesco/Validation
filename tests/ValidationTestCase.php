<?php

use Orchestra\Testbench\TestCase;

abstract class ValidationTestCase extends TestCase
{
    /**
     * @param $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            'KennedyTedesco\Validation\ValidationServiceProvider',
        ];
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
