<?php
namespace KennedyTedesco\Validation\Respect;

class Validator
{
    const RULE_PATH = 'Respect\\Validation\\Rules\\';

    /**
     * Magic method
     *
     * @param string $name
     * @param array $arguments
     * @return bool
     */     
    public function __call($name, $arguments)
    {
        $rule   = self::RULE_PATH . ucfirst($name);
        $value  = $arguments[1];
        $args   = $arguments[2];       
        return $this->validate($rule, $value, $args);
    }
    
    /**
     * Validates the rule dynamically
     *
     * @param string $rule
     * @param string $value
     * @param array $args
     * @return bool
     */      
    protected function validate($rule, $value, array $args)
    {
        try {
            $validatorClass = new \ReflectionClass($rule);
            return $validatorClass->newInstanceArgs($args)->validate($value);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }    
}
