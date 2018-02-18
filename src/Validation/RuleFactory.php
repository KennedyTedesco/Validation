<?php

namespace KennedyTedesco\Validation;

use ReflectionClass;

final class RuleFactory
{
    private static $alias = [
        'FileExists'    => 'Exists',
        'Arr'           => 'ArrayVal',
        'Bool'          => 'BoolType',
        'False'         => 'FalseVal',
        'Float'         => 'FloatVal',
        'Int'           => 'IntVal',
        'NullValue'     => 'NullType',
        'Object'        => 'ObjectType',
        'String'        => 'StringType',
        'True'          => 'TrueVal',
    ];

    public static function make(string $rule, array $parameters = [])
    {
        $class = 'Respect\\Validation\\Rules\\'.(self::$alias[$rule] ?? $rule);

        $validator = new ReflectionClass($class);

        return $validator->newInstanceArgs($parameters);
    }
}
