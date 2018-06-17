<?php

namespace Core;

class Settings
{
    protected static $config;

    private function __construct($config_file) {
        self::$config = json_decode(file_get_contents($config_file), true);
    }

    public static function init($config_file) {
        if (self::$config === null) {
            new self($config_file);
        }
    }

    public static function get($key) {
        return self::$config[$key];
    }

}