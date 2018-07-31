<?php

namespace Submtd\LaravelCustomLog;

use Illuminate\Support\Facades\Log;

trait HasCustomLog
{
    public static function debug($message)
    {
        static::log(__FUNCTION__, $message);
    }

    public static function info($message)
    {
        static::log(__FUNCTION__, $message);
    }

    public static function notice($message)
    {
        static::log(__FUNCTION__, $message);
    }

    public static function warning($message)
    {
        static::log(__FUNCTION__, $message);
    }

    public static function error($message)
    {
        static::log(__FUNCTION__, $message);
    }

    public static function critical($message)
    {
        static::log(__FUNCTION__, $message);
    }

    public static function alert($message)
    {
        static::log(__FUNCTION__, $message);
    }

    public static function emergency($message)
    {
        static::log(__FUNCTION__, $message);
    }

    private static function log($severity, $message)
    {
        $class = get_called_class();
        if (!method_exists($class, 'logChannel') || !is_callable([$class, 'logChannel'])) {
            return Log::$severity($message);
        }
        config(['logging.channels.customLog' => call_user_func([$class, 'logChannel'])]);
        return Log::channel('customLog')->$severity($message);
    }
}
