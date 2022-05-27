<?php

declare(strict_types=1);

namespace KennedyTedesco\Validation;

use ReflectionClass;
use ReflectionException;
use Respect\Validation\Validatable;

final class RuleFactory
{
    /**
     * @throws ReflectionException
     */
    public static function make(string $rule, array $parameters = []): Validatable
    {
        $alias = [
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

        $validator = new ReflectionClass(
            'Respect\\Validation\\Rules\\'.($alias[$rule] ?? $rule),
        );

        /** @var Validatable $instance */
        $instance = $validator->newInstanceArgs($parameters);

        return $instance;
    }
}
