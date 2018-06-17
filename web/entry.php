<?php

require_once '../core/Db.php';
require_once '../core/Input.php';
require_once '../core/Router.php';
require_once '../core/Settings.php';
require_once '../core/Templater.php';
require_once '../core/Cache.php';

Core\Input::init();

Core\Settings::init('../config/config.json');

Core\Db::init();

Core\Templater::init(Core\Settings::get('templates_folder'), Core\Settings::get('templates_cache_folder'));

spl_autoload_register(function ($class_name) {
    $file = '../app/' . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
    if(is_file($file)) require_once $file;
});

$router = new Core\Router('../config/routes.json');

//Cache::init();
//
//
//if(!Cache::get('test2')){
//    Cache::set('test2',date('d.m.Y h:i:s'));
//}
//
//echo Cache::get('test2');