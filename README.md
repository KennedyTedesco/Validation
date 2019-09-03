kennedytedesco/validation
==========

The power of [Respect Validation](https://github.com/Respect/Validation) on Laravel.

[![Build Status](https://travis-ci.org/KennedyTedesco/Validation.svg)](https://travis-ci.org/KennedyTedesco/Validation)
[![Total Downloads](https://poser.pugx.org/KennedyTedesco/Validation/downloads.svg)](https://packagist.org/packages/KennedyTedesco/Validation)
[![Latest Stable Version](https://poser.pugx.org/KennedyTedesco/Validation/v/stable.svg)](https://packagist.org/packages/KennedyTedesco/Validation)
[![License](https://poser.pugx.org/orchestra/testbench/license)](https://packagist.org/packages/orchestra/testbench)

## Version Compatibility

 Laravel  | kennedytedesco/validation
:---------|:----------
 **6.x**  | `"kennedytedesco/validation": "^6.0"`
 5.8.x    | `"kennedytedesco/validation": "^5.0"`
 5.7.x    | `"kennedytedesco/validation": "^5.0"`
 5.6.x    | `"kennedytedesco/validation": "^5.0"`
 5.5.x    | `"kennedytedesco/validation": "^5.0"`
 5.4.x    | `"kennedytedesco/validation": "^4.0"`

## Installation

```php
composer require kennedytedesco/validation: "^6.0"
```

## Supported rules (with examples)

```php
$rules = [
    'cpf'               => ['cpf',],
    'cnpj'              => ['cnpj',],
    'cnh'               => ['cnh',],
    'minimumAge'        => ['minimumAge:20',],
    'callback'          => ['callback:is_int',],
    'charset'           => ['charset:ASCII',],
    'consonant'         => ['consonant',],
    'vowel'             => ['vowel',],
    'alnum'             => ['alnum:-',],
    'digit'             => ['digit',],
    'alpha'             => ['alpha',],
    'containsArray'     => ['contains:banana',],
    'contains'          => ['contains:banana',],
    'countryCode'       => ['countryCode',],
    'creditCard'        => ['digit', 'creditCard',],
    'domain'            => ['domain',],
    'directory'         => ['directory',],
    'fileExists'        => ['fileExists',],
    'isFile'            => ['file',],
    'endsWith'          => ['endsWith:banana',],
    'equals'            => ['equals:banana',],
    'even'              => ['even',],
    'floatVal'          => ['floatVal',],
    'float'             => ['floatVal',],
    'graph'             => ['graph',],
    'instance'          => ['instance:DateTime',],
    'int'               => ['int',],
    'json'              => ['json',],
    'leapDate'          => ['leapDate:Y-m-d',],
    'leapYear'          => ['leapYear',],
    'arrayVal'          => ['arrayVal',],
    'Arr'               => ['arrayVal',],
    'lowercase'         => ['lowercase',],
    'macAddress'        => ['macAddress',],
    'multiple'          => ['multiple:3',],
    'negative'          => ['negative',],
    'noWhitespace'      => ['noWhitespace',],
    'nullValue'         => ['nullValue',],
    'numeric'           => ['numeric',],
    'objectType'        => ['objectType',],
    'odd'               => ['odd',],
    'perfectSquare'     => ['perfectSquare',],
    'positive'          => ['positive',],
    'primeNumber'       => ['primeNumber',],
    'punct'             => ['punct',],
    'readable'          => ['readable',],
    'regex'             => ['regex:/5/',],
    'roman'             => ['roman',],
    'slug'              => ['slug',],
    'space'             => ['space:b',],
    'tld'               => ['tld',],
    'uppercase'         => ['uppercase',],
    'version'           => ['version',],
    'xdigit'            => ['xdigit',],
    'writable'          => ['writable',],
    'alwaysValid'       => ['alwaysValid',],
    'boolType'          => ['boolType',],
    'youtube'           => ['videoUrl:youtube',],
    'vimeo'             => ['videoUrl:vimeo',],
    'video1'            => ['videoUrl',],
    'video2'            => ['videoUrl',],
];

$data = [
    'cpf'               => '22205417118',
    'cnpj'              => '68518321000116',
    'cnh'               => '02650306461',
    'callback'          => 20,
    'charset'           => 'acucar',
    'consonant'         => 'dcfg',
    'vowel'             => 'aeiou',
    'alnum'             => 'banana-123 ',
    'digit'             => '120129  21212',
    'alpha'             => 'banana',
    'containsArray'     => ['www', 'banana', 'jfk', 'http',],
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
    'instance'          => new \Datetime(),
    'int'               => 9,
    'json'              => '{"file":"laravel.php"}',
    'leapDate'          => '1988-02-29',
    'leapYear'          => '1988',
    'arrayVal'          => ['Brazil',],
    'lowercase'         => 'brazil',
    'macAddress'        => '00:11:22:33:44:55',
    'multiple'          => '9',
    'negative'          => '-10',
    'noWhitespace'      => 'laravelBrazil',
    'nullValue'         => null,
    'numeric'           => '179.9',
    'objectType'        => new \stdClass(),
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
    'uppercase'         => 'BRAZIL',
    'version'           => '1.0.0',
    'xdigit'            => 'abc123',
    'writable'          => __FILE__,
    'alwaysValid'       => '@#$_',
    'boolType'          => \is_int(2),
    'youtube'           => 'http://youtu.be/l2gLWaGatFA',
    'vimeo'             => 'http://vimeo.com/33677985',
    'video1'            => 'https://youtu.be/l2gLWaGatFA',
    'video2'            => 'https://vimeo.com/33677985',
];

$validator = \Validator::make($data, $rules);

if ($validator->passes()) {
    // Do something
}
```

# For more validation rules

See all available rules here:

https://respect-validation.readthedocs.io/en/1.1/list-of-rules/

Repository of Respect Validation:

https://github.com/Respect/Validation
