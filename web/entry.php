<?php

spl_autoload_register(function ($class_name) {
    if(is_file('../core/'.$class_name . '.php')) include '../core/'.$class_name . '.php';
    if(is_file('../app/controllers/'.$class_name . '.php')) include '../app/controllers/'.$class_name . '.php';
    if(is_file('../src/'.$class_name . '.php')) include '../src/'.$class_name . '.php';
});

Templater::init('../app/templates', '../tmp/templates_cache');

Settings::init('../config/config.json');

Db::init();

Input::init();


//$router = new Router('../config/routes.json');

$memcache = new Memcache;
$memcache->connect('localhost', 11211);
echo $memcache->getVersion();

$m = new Memcached();
$m->addServer('localhost', 11211);

print_r($m->getVersion());
