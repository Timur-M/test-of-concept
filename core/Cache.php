<?php

namespace Core;

class Cache
{
    protected static $cache;

    private function __construct() {
        self::$cache = new Memcached();
        self::$cache->addServer('localhost', 11211);
    }

    public static function init() {
        if (self::$cache === null) {
            new self;
        }
    }

    public static function get($key) {
        return self::$cache->get($key);
    }

    public static function set($key,$value,$ttl = 3600) {
        return self::$cache->set($key,$value,$ttl);
    }
}