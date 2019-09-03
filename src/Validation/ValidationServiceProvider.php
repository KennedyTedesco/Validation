<?php

declare(strict_types=1);

namespace KennedyTedesco\Validation;

use Illuminate\Support\ServiceProvider;

final class ValidationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app['validator']->resolver(static function ($translator, $data, $rules, $messages, $customAttributes) {
            return new Validator($translator, $data, $rules, $messages, $customAttributes);
        });
    }
}
