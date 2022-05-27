<?php

$finder = PhpCsFixer\Finder::create()
    ->in('src');

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'protected_to_private' => false,
        'trailing_comma_in_multiline' => [
            'elements' => ['arrays', 'arguments', 'parameters'],
        ],
    ])
    ->setRiskyAllowed(true)
    ->setFinder($finder);
