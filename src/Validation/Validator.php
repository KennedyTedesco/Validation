<?php
namespace KennedyTedesco\Validation;

use Symfony\Component\Translation\TranslatorInterface;
use Illuminate\Validation\Validator as BaseValidator;
use KennedyTedesco\Validation\Respect\Factory as RuleFactory;

class Validator extends BaseValidator
{
    /**
     * All supported rules.
     *
     * @var array
     */
    private $_validRules = [];

    /**
     * Create a new Validator instance.
     *
     * @param  \Symfony\Component\Translation\TranslatorInterface  $translator
     * @param  array  $data
     * @param  array  $rules
     * @param  array  $messages
     * @param  array  $customAttributes
     */
    public function __construct(TranslatorInterface $translator, array $data, array $rules, array $messages = [], array $customAttributes = [])
    {
        parent::__construct($translator, $data, $rules, $messages, $customAttributes);

        $this->_validRules = $this->getValidRules();
    }

    /**
     * Handle dynamic calls to class methods.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        $rule = lcfirst(substr($method, 8));

        if (in_array($rule, $this->_validRules)) {
            $args = $parameters[2];
            $value = $parameters[1];
            $ruleObject = RuleFactory::make($rule, $args);
            return $ruleObject->validate($value);
        }

        return parent::__call($method, $parameters);
    }

    /**
     * Get all supported rules from Respect.
     *
     * @return bool
     */
    protected function getValidRules()
    {
        $path = __DIR__ . '/Respect/Rules.php';

        return array_unique(require $path, SORT_REGULAR);
    }

    /**
     * Validate a minimum age.
     *
     * @param  string  $attribute
     * @param  mixed   $value
     * @param  array   $parameters
     * @return bool
     */
    public function validateMinimumAge($attribute, $value, $parameters)
    {
        $parameter = (int) $parameters[0];
        return RuleFactory::make('MinimumAge', array($parameter))->validate($value);
    }

    /**
     * Validate if file exists.
     *
     * @param  string  $attribute
     * @param  mixed   $value
     * @param  array   $parameters
     * @return bool
     */
    public function validateFileExists($attribute, $value, $parameters)
    {
        return RuleFactory::make('exists', array())->validate($value);
    }

    /**
     * Replace all place-holders for the MinimumAge rule.
     *
     * @param  string  $message
     * @param  string  $attribute
     * @param  string  $rule
     * @param  array   $parameters
     * @return string
     */
    protected function replaceMinimumAge($message, $attribute, $rule, $parameters)
    {
        return str_replace(':age', $parameters[0], $message);
    }

    /**
     * Replace all place-holders for the Contains rule.
     *
     * @param  string  $message
     * @param  string  $attribute
     * @param  string  $rule
     * @param  array   $parameters
     * @return string
     */
    protected function replaceContains($message, $attribute, $rule, $parameters)
    {
        return str_replace(':value', $parameters[0], $message);
    }

    /**
     * Replace all place-holders for the Charset rule.
     *
     * @param  string  $message
     * @param  string  $attribute
     * @param  string  $rule
     * @param  array   $parameters
     * @return string
     */
    protected function replaceCharset($message, $attribute, $rule, $parameters)
    {
        return str_replace(':charset', $parameters[0], $message);
    }

    /**
     * Replace all place-holders for the EndsWith rule.
     *
     * @param  string  $message
     * @param  string  $attribute
     * @param  string  $rule
     * @param  array   $parameters
     * @return string
     */
    protected function replaceEndsWith($message, $attribute, $rule, $parameters)
    {
        return str_replace(':value', $parameters[0], $message);
    }

    /**
     * Replace all place-holders for the Multiple rule.
     *
     * @param  string  $message
     * @param  string  $attribute
     * @param  string  $rule
     * @param  array   $parameters
     * @return string
     */
    protected function replaceMultiple($message, $attribute, $rule, $parameters)
    {
        return str_replace(':value', $parameters[0], $message);
    }
}
