Validation (Laravel 4 Package)
==========

*"The power of 'Respect Validation' on Laravel 4 Validation"*

### Required setup

In the **require** key of **composer.json** file add the following:

```php
"kennedytedesco/validation": "dev-master"
```

Run the Composer **update** comand:

```php
composer update
```

In your **config/app.php** add *'KennedyTedesco\Validation\ValidationServiceProvider'* to the end of the **'providers'** array:

```php
'providers' => array(
    ...
    ...
    'KennedyTedesco\Validation\ValidationServiceProvider',
),
```

## Supported rules 

Most 'Respect' rules are supported.

### Type

+ arr
+ bool
+ float
+ instance
+ int
+ null_value
+ numeric
+ object
+ string
+ xdigit
+ date

##### Simple example:

```php
// Rules
$rules = array(
  'arr'           => 'arr',
	'bool'          => 'bool',
	'float'         => 'float',
	'instance'      => 'instance:DateTime',
	'int'           => 'int',
	'null_value'    => 'null_value',
	'numeric'       => 'numeric',
	'object'        => 'object',
	'string'        => 'string',
	'xdigit'        => 'xdigit',
);

// Data
$data = array(
	'arr'           => array('Banana'),
	'bool'          => TRUE,
	'float'         => 10.2,
	'instance'      => new DateTime(),
	'int'           => 10,
	'null_value'    => null,
	'numeric'       => '120',
	'object'        => new DateTime(),
	'string'        => 'Banana 100',
	'xdigit'        => 'AEE123',
);

// Make the validation
$validator = Validator::make($data, $rules);

// Result
echo ($validator->fails()) ? 'False' : 'True'; // True
```

### Generics

+ callback
+ always_valid
+ always_invalid

##### Simple example:

```php
// Rules
$rules = array(
    'callback'          => 'callback:is_int',
    'always_valid'      => 'always_valid',
    //'always_invalid'    => 'always_invalid',
);

// Data
$data = array(
    'callback'          => 20,
    'always_valid'      => '@#$_',
    //'always_invalid'    => '12@#!',
);

// Make the validation
$validator = Validator::make($data, $rules);

// Result
echo ($validator->fails()) ? 'False' : 'True'; // True
```

### Comparing Values

+ equals
+ between
+ max
+ min 

##### Simple example:

Soon.


### Numeric

+ between
+ bool
+ even
+ float
+ int
+ multiple
+ negative
+ not_empty (in 'Respect' notEmpty) 
+ numeric
+ odd
+ perfect_square (in 'Respect' perfectSquare) 
+ positive
+ prime_number (in 'Respect' primeNumber) 
+ roman
+ xdigit 

##### Simple example:

Soon.


### Strings

+ alnum
+ alpha
+ between
+ charset
+ consonant
+ contains
+ cntrl
+ digit
+ ends_with (in 'Respect' endsWith)
+ in
+ graph
+ length
+ lowercase
+ not_empty (in 'Respect' notEmpty)
+ no_whitespace (in 'Respect' noWhitespace)
+ prnt
+ punct
+ regex
+ slug
+ space
+ starts_with (in 'Respect' startsWith)
+ uppercase
+ uppercase
+ version
+ vowel
+ xdigit

##### Simple example:

Soon.

### Arrays

+ arr
+ contains
+ each
+ ends_with (in 'Respect' endsWith)
+ in
+ key
+ length
+ not_empty (in 'Respect' notEmpty)
+ starts_with (in 'Respect' startsWith)

##### Simple example:

Soon.


### Objects

+ attribute
+ instance
+ length

##### Simple example:

Soon.


### Date and Time

+ between
+ date
+ leap_date (in 'Respect' leapDate)
+ leap_year (in 'Respect' leapYear)

##### Simple example:

Soon.


### Regional

+ tld
+ country_code (in 'Respect' countryCode)

##### Simple example:

Soon.


### Files

+ directory
+ exists
+ file
+ readable
+ symbolic_link (in 'Respect' symbolicLink)
+ uploaded
+ writable

##### Simple example:

Soon.


### Others

+ cnh
+ cnpj
+ cpf
+ domain
+ email
+ ip
+ json
+ mac_address (in 'Respect' macAddress)
+ phone
+ sf
+ zend

##### Simple example:

Soon.

# Respect Validation

For more details on the rules:

https://github.com/Respect/Validation

Tks for Respect: **The most awesome validation engine ever created for PHP!**
