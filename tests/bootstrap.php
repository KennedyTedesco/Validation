<?php

// Composer has been run?
if (! file_exists(__DIR__ . '/../composer.lock')) {
    die("You must do a 'composer install' before running the tests.");
}

// Autoloader
require __DIR__ . '/../vendor/autoload.php';

// Test case
require __DIR__ . '/ValidationTestCase.php';
