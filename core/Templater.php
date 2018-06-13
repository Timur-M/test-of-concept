<?php

class Templater
{
    protected static $template_engine;

    private function __construct($templates_folder,$cache_folder) {
        Fenom::registerAutoload();
        self::$template_engine = Fenom::factory($templates_folder, $cache_folder,Fenom::AUTO_RELOAD);
    }

    public static function init($templates_folder,$cache_folder) {
        if (self::$template_engine === null) {
            new self($templates_folder,$cache_folder);
        }
    }

    public static function fetch($template_file, $vars) {
        return self::$template_engine->fetch($template_file, $vars);
    }

    public static function display($template_file, $vars) {
        self::$template_engine->display($template_file, $vars);
    }

}