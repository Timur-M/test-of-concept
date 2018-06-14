<?php

spl_autoload_register(function ($class_name) {
    if(is_file('../core/'.$class_name . '.php')) require_once '../core/'.$class_name . '.php';
    if(is_file('../app/controllers/'.$class_name . '.php')) require_once '../app/controllers/'.$class_name . '.php';
    if(is_file('../src/'.$class_name . '.php')) require_once '../src/'.$class_name . '.php';
});

Settings::init('../config/config.json');

Templater::init(Settings::get('templates_folder'), Settings::get('templates_cache_folder'));

Db::init();

Input::init();


$router = new Router('../config/routes.json');

//Cache::init();
//
//
//if(!Cache::get('test2')){
//    Cache::set('test2',date('d.m.Y h:i:s'));
//}
//
//echo Cache::get('test2');