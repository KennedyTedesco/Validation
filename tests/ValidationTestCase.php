<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Validation\Validator;
use KennedyTedesco\Validation\ValidationServiceProvider;

abstract class ValidationTestCase extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            ValidationServiceProvider::class
        ];
    }

    protected function validate(array $data, array $rules, array $messages = []): Validator
    {
        return $this->app->make('validator')->make($data, $rules, $messages);
    }
}
