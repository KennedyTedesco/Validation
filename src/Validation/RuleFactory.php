<?php
namespace KennedyTedesco\Validation;

use ReflectionClass;

final class RuleFactory
{
    const RULE_PATH = 'Respect\\Validation\\Rules\\';

    public static function make($rule, array $parameters = [])
    {
        $class = self::RULE_PATH . ucfirst($rule);
        $validator = new ReflectionClass($class);
        return $validator->newInstanceArgs($parameters);
    }
}
