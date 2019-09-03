<?php

declare(strict_types=1);

namespace KennedyTedesco\Validation;

use Illuminate\Validation\Validator as BaseValidator;

final class Validator extends BaseValidator
{
    public function __call($method, $parameters)
    {
        try {
            $rule = \mb_substr($method, 8);

            [$value, $args] = [
                $parameters[1],
                $parameters[2],
            ];

            return RuleFactory::make($rule, $args)->validate($value);
        } catch (\Exception $e) {
            return parent::__call($method, $parameters);
        }
    }
}
