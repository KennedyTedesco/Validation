<?php

namespace KennedyTedesco\Validation;

use Exception;
use Illuminate\Validation\Validator as BaseValidator;

class Validator extends BaseValidator
{
    /**
     * Handle dynamic calls to class methods.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        try {
            $rule = substr($method, 8);
            $args = $parameters[2];
            $value = $parameters[1];
            $validation = RuleFactory::make($rule, $args);

            return $validation->validate($value);
        } catch (Exception $e) {
            return parent::__call($method, $parameters);
        }
    }

    /**
     * Replace all error message place-holders with actual values.
     *
     * @param  string  $message
     * @param  string  $attribute
     * @param  string  $rule
     * @param  array   $parameters
     * @return string
     */
    protected function doReplacements($message, $attribute, $rule, $parameters)
    {
        $message = parent::doReplacements($message, $attribute, $rule, $parameters);
        $search = [];
        foreach ($parameters as $key => $parameter) {
            array_push($search, ':parameter'.$key);
        }

        return str_replace($search, $parameters, $message);
    }
}
