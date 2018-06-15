<?php

class Input
{
    static $protocol;
    static $post = [];
    static $get = [];
    static $url;
    static $uri;
    static $uri_query = '';
    static $uri_path;
    static $path_segments = [];

    private function __construct()
    {
        parse_str(file_get_contents('php://input'), self::$post);

        self::$get = $_GET;

        self::$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        self::$uri = $_SERVER['REQUEST_URI'];

        $exploded_uri = explode("?", $_SERVER['REQUEST_URI']);

        self::$uri_path = $exploded_uri[0];

        if (isset($exploded_uri[1])) self::$uri_query = $exploded_uri[1];

        self::$path_segments = explode("/",ltrim($exploded_uri[0],"/"));

        self::$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    }

    public static function init() {
        if (self::$url === null) {
            new self;
        }
    }
}