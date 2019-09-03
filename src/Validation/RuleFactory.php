<?php

declare(strict_types=1);

namespace KennedyTedesco\Validation;

final class RuleFactory
{
    private static $alias = [
        'FileExists' => 'Exists',
        'Arr' => 'ArrayVal',
        'Bool' => 'BoolType',
        'False' => 'FalseVal',
        'Float' => 'FloatVal',
        'Int' => 'IntVal',
        'NullValue' => 'NullType',
        'Object' => 'ObjectType',
        'String' => 'StringType',
        'True' => 'TrueVal',
    ];

    public static function make(string $rule, array $parameters = [])
    {
        $validator = new \ReflectionClass(
            'Respect\\Validation\\Rules\\'.(self::$alias[$rule] ?? $rule)
        );

        return $validator->newInstanceArgs($parameters);
    }
}
