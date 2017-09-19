<?php

namespace KennedyTedesco\Validation;

use Exception;
use Illuminate\Validation\Validator as BaseValidator;

class Validator extends BaseValidator
{
    /**
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        try {
            $rule = substr($method, 8);
            $args = $parameters[2];
            $value = $parameters[1];

            return RuleFactory::make($rule, $args)->validate($value);
        } catch (Exception $e) {
            return parent::__call($method, $parameters);
        }
    }
}
