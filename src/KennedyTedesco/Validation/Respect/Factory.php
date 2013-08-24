<?php
namespace KennedyTedesco\Validation\Respect;

class Factory
{
    const RULE_PATH = 'Respect\\Validation\\Rules\\';

    public static function make($rule, array $parameters)
    {
        $class = self::RULE_PATH . ucfirst($rule);       
        try {
            $validatorClass = new \ReflectionClass($class);
            return $validatorClass->newInstanceArgs($parameters);     
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }   
    }   
}