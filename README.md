[![Build Status](https://travis-ci.org/KennedyTedesco/Validation.svg)](https://travis-ci.org/KennedyTedesco/Validation)
[![Total Downloads](https://poser.pugx.org/KennedyTedesco/Validation/downloads.svg)](https://packagist.org/packages/KennedyTedesco/Validation)
[![Latest Stable Version](https://poser.pugx.org/KennedyTedesco/Validation/v/stable.svg)](https://packagist.org/packages/KennedyTedesco/Validation)

Validation (Laravel Package)
==========

*"The power of 'Respect Validation' on Laravel"*

## Version Compatibility

 Laravel  | kennedytedesco/validation
:---------|:----------
 **5.8.x**    | `"kennedytedesco/validation": "^5.0"`
 **5.7.x**    | `"kennedytedesco/validation": "^5.0"`
 **5.6.x**    | `"kennedytedesco/validation": "^5.0"`
 5.5.x    | `"kennedytedesco/validation": "^5.0"`
 5.4.x    | `"kennedytedesco/validation": "^4.0"`
 5.3.x    | `"kennedytedesco/validation": "^3.0"`
 5.2.x    | `"kennedytedesco/validation": "^3.0"`
 5.1.x    | `"kennedytedesco/validation": "^2.0"`
 5.0.x    | `"kennedytedesco/validation": "^2.0"`
 4.2.x    | `"kennedytedesco/validation": "^1.0"`
 4.1.x    | `"kennedytedesco/validation": "^1.0"`
 4.0.x    | `"kennedytedesco/validation": "^1.0"`

## Installation

Put the following in your `composer require` (`^5.0` if your Laravel version is 5.5):

```php
composer require kennedytedesco/validation: "^5.0"
```

In your **config/app.php** add *'KennedyTedesco\Validation\ValidationServiceProvider'* to the end of the **'providers'** array:

```php
'providers' => array(
    ...
    ...
    'KennedyTedesco\Validation\ValidationServiceProvider',
),
```

## Supported rules (with examples)

```php
// Rules
$rules = array(
    'cpf'               => 'cpf',
    'cnpj'              => 'cnpj',
    'cnh'               => 'cnh',
    //'minimumAge'        => 'minimumAge:20',
    'callback'          => 'callback:is_int',
    'charset'           => 'charset:ASCII',
    'consonant'         => 'consonant',
    'vowel'             => 'vowel',
    'alnum'             => 'alnum:-',
    'digit'             => 'digit',
    'alpha'             => 'alpha',
    'containsArray'     => 'contains:banana',
    'contains'          => 'contains:banana',
    'countryCode'       => 'countryCode',
    'creditCard'        => 'digit|creditCard',
    'domain'            => 'domain',
    'directory'         => 'directory',
    'fileExists'        => 'fileExists',
    'isFile'            => 'file',
    'endsWith'          => 'endsWith:banana',
    'equals'            => 'equals:banana',
    'even'              => 'even',
    'floatVal'          => 'floatVal',
    'graph'             => 'graph',
    'instance'          => 'instance:DateTime',
    'int'               => 'int',
    'json'              => 'json',
    'leapDate'          => 'leapDate:Y-m-d',
    'leapYear'          => 'leapYear',
    'arrayVal'          => 'arrayVal',
    'lowercase'         => 'lowercase',
    'macAddress'        => 'macAddress',
    'multiple'          => 'multiple:3',
    'negative'          => 'negative',
    'noWhitespace'      => 'noWhitespace',
    'nullValue'         => 'nullValue',
    'numeric'           => 'numeric',
    'objectType'        => 'objectType',
    'odd'               => 'odd',
    'perfectSquare'     => 'perfectSquare',
    'positive'          => 'positive',
    'primeNumber'       => 'primeNumber',
    'punct'             => 'punct',
    'readable'          => 'readable',
    'regex'             => 'regex:/5/',
    'roman'             => 'roman',
    'slug'              => 'slug',
    'space'             => 'space:b',
    'tld'               => 'tld',
    //'uploaded'          => 'uploaded',
    'uppercase'         => 'uppercase',
    'version'           => 'version',
    'xdigit'            => 'xdigit',
    'writable'          => 'writable',
    'alwaysValid'       => 'alwaysValid',
    'boolType'          => 'boolType',
    'youtube'           => 'videoUrl:youtube',
    'vimeo'             => 'videoUrl:vimeo',
    'video1'            => 'videoUrl',
    'video2'            => 'videoUrl',
);

// Data
$data = array(
    'cpf'               => '22205417118',
    'cnpj'              => '68518321000116',
    'cnh'               => '02650306461',
    //'minimumAge'        => '10/10/1990',
    'callback'          => 20,
    'charset'           => 'acucar',
    'consonant'         => 'dcfg',
    'vowel'             => 'aeiou',
    'alnum'             => 'banana-123 ',
    'digit'             => '120129  21212',
    'alpha'             => 'banana',
    'containsArray'     => ['www', 'banana', 'jfk', 'http'],
    'contains'          => 'www banana jfk http',
    'countryCode'       => 'BR',
    'creditCard'        => '5555666677778884',
    'domain'            => 'google.com.br',
    'directory'         => __DIR__,
    'fileExists'        => __FILE__,
    'file'              => __FILE__,
    'endsWith'          => 'pera banana',
    'equals'            => 'banana',
    'even'              => 8,
    'floatVal'          => 9.8,
    'graph'             => 'LKM@#$%4;',
    'instance'          => new Datetime(),
    'int'               => 9,
    'json'              => '{"file":"laravel.php"}',
    'leapDate'          => '1988-02-29',
    'leapYear'          => '1988',
    'arrayVal'          => ['Brazil'],
    'lowercase'         => 'brazil',
    'macAddress'        => '00:11:22:33:44:55',
    'multiple'          => '9',
    'negative'          => '-10',
    'noWhitespace'      => 'laravelBrazil',
    'nullValue'         => null,
    'numeric'           => '179.9',
    'objectType'        => new stdClass(),
    'odd'               => 3,
    'perfectSquare'     => 25,
    'positive'          => 1,
    'primeNumber'       => 7,
    'punct'             => '&,.;[]',
    'readable'          => __FILE__,
    'regex'             => '5',
    'roman'             => 'VI',
    'slug'              => 'laravel-brazil',
    'space'             => '              b      ',
    'tld'               => 'com',
    //'uploaded'          => 'path to file',
    'uppercase'         => 'BRAZIL',
    'version'           => '1.0.0',
    'xdigit'            => 'abc123',
    'writable'          => __FILE__,
    'alwaysValid'       => '@#$_',
    'boolType'          => is_int(2),
    'youtube'           => 'http://youtu.be/l2gLWaGatFA',
    'vimeo'             => 'http://vimeo.com/33677985',
    'video1'            => 'https://youtu.be/l2gLWaGatFA',
    'video2'            => 'https://vimeo.com/33677985',
);

// Make the validation
$validator = \Validator::make($data, $rules);

// Result
if( $validator->fails() )
{
    // Print errors
    $messages = $validator->messages();
    foreach ($messages->all() as $message) {
        echo '<li>'.$message.'</li>';
    }
}
else
{
    // Success
    echo 'True.';
}
```

# Respect Validation

For more details about the available rules:

http://respect.github.io/Validation/docs/validators.html

Repository of Respect Validation:

https://github.com/Respect/Validation
