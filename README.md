# laravel-custom-log

Create custom logs from within classes in Laravel.

## Installation

```
composer require submtd/laravel-custom-log
```

## Usage

Add the HasCustomLog trait to your class, and add a public static method called logChannel().

```
<?php

use Submtd\LaravelCustomLog\HasCustomLog;

class Person
{
    use HasCustomLog;
    
    /**
     * logChannel method
     * Method used to define a custom log channel for this class.
     * @return array -- return a Laravel log channel array
     **/
    public static function logChannel()
    {
        return [
            'driver' => 'single',
            'path' => storage_path('logs/person.log'),
            'level' => 'warning',
        ];
    }
}
```

## Logging

In order to log a message to your custom log channel, call ```static::debug('This is a log message')```.

Available log methods are as follows:

```
static::debug($message);
static::info($message);
static::notice($message);
static::warning($message);
static::error($message);
static::critical($message);
static::alert($message);
static::emergency($message);
```
