<?php

$finder = Symfony\Component\Finder\Finder::create()
    ->notPath('vendor')
    ->in(__DIR__)
    ->name('*.php');

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        'array_syntax' => ['syntax' => 'short'],
        'is_null' => true,
        'list_syntax' => [
            'syntax' => 'short',
        ],
        'lowercase_cast' => true,
        'lowercase_static_reference' => true,
        'mb_str_functions' => true,
        'modernize_types_casting' => true,
        'native_constant_invocation' => true,
        'native_function_casing' => true,
        'native_function_invocation' => true,
        'new_with_braces' => true,
        'no_unused_imports' => true,
        'ordered_imports' => ['sortAlgorithm' => 'length'],
        'return_type_declaration' => ['space_before' => 'none'],
    ])
    ->setFinder($finder);
