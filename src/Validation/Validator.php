<?php

namespace KennedyTedesco\Validation;

use Illuminate\Validation\Validator as BaseValidator;
use KennedyTedesco\Validation\Respect\Factory as RuleFactory;
use Symfony\Component\Translation\TranslatorInterface;

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
            $args       = $parameters[2];
            $value      = $parameters[1];
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

    /**
     * valida hora
     * @param  string $attribute
     * @param  string $value
     * @param  string $parameters
     *
     * @return bool
     */
    public function validateHora($attribute, $value, $parameters)
    {
        return preg_match('/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $value, $matches);
    }
    /**
     * valida Telefone
     * @param  string $attribute
     * @param  string $value
     * @param  string $parameters
     *
     * @return bool
     */
    public function validateTelefone($attribute, $value, $parameters)
    {
        $result = false;
        //Verifica telefones
        // 0XX XXXX-XXXX
        // XX XXXX-XXXX
        // XXXX - XXXX
        $result = preg_match('/^(0?[1-9]{2})?(([2-9][0-9]{7})|(9[0-9][0-9]{7}))$/', $value, $matches);
        if ($result) {
            return true;
        }
        //Verifica 0800
        return preg_match('/^0800([0-9]{7,8})$/', $value, $matches);
    }
    /**
     * valida Celular
     * @param  string $attribute
     * @param  string $value
     * @param  string $parameters
     *
     * @return bool
     */
    public function validateCelular($attribute, $value, $parameters)
    {
        $result = false;
        //Verifica telefones
        // 0XX XXXX-XXXX
        // XX XXXX-XXXX
        // XXXX - XXXX
        return preg_match('/^(0?[1-9]{2})?(([6-9][0-9]{7})|(9[0-9][0-9]{7}))$/', $value, $matches);
    }
    /**
     * valida CPF/CNPJ
     * @param  string $attribute
     * @param  string $value
     * @param  string $parameters
     *
     * @return bool
     */
    public function validateCnpjCpf($attribute, $value, $parameters)
    {
        if ($this->isCnpj($value)) {
            return $this->validateCnpj($attribute, $value, $parameters);
        }

        return $this->validateCpf($attribute, $value, $parameters);
    }
    /**
     * valida CPF/CNPJ possibilitando ter números zerados
     * @param  string $attribute
     * @param  string $value
     * @param  string $parameters
     *
     * @return bool
     */
    public function validateCnpjCpfZero($attribute, $value, $parameters)
    {
        if ($value == '00000000000' || $value == '00000000000000') {
            return true;
        }

        return $this->validateCnpjCpf($attribute, $value, $parameters);
    }
    /**
     * Verifica se o tamanho pode ser um CNPJ
     *
     * @param  string  $value
     *
     * @return boolean
     */
    public function isCnpj($value = '')
    {
        return (strlen($value) > 11);
    }
}
