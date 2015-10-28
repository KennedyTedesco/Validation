<?php

namespace KennedyTedesco\Validation;

use ReflectionClass;

final class RuleFactory
{
    /**
     * @const string
     */
    const RULE_PATH = 'Respect\\Validation\\Rules\\';

    /**
     * @var array
     */
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

    /**
     * @param mixed $rule
     * @param array $parameters
     *
     * @return mixed
     */
    public static function make($rule, array $parameters = [])
    {
        $class = self::RULE_PATH.self::getRule($rule);
        $validator = new ReflectionClass($class);

        return $validator->newInstanceArgs($parameters);
    }

    /**
     * @param mixed $rule
     *
     * @return mixed
     */
    private static function getRule($rule)
    {
        return isset(self::$alias[$rule]) ? self::$alias[$rule] : $rule;
    }
}
