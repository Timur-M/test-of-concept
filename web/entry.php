<?php

spl_autoload_register(function ($class_name) {
    if(is_file('../core/'.$class_name . '.php')) include '../core/'.$class_name . '.php';
    if(is_file('../app/controllers/'.$class_name . '.php')) include '../app/controllers/'.$class_name . '.php';
});

include '../src/Fenom.php';
Fenom::registerAutoload();
$fenom = Fenom::factory('../app/templates', '../tmp/templates_cache',Fenom::AUTO_RELOAD);

$settings = new Settings('../config/config.json');

$db = new Db($settings);

$input = new Input();


$router = new Router($db, $input, $fenom, '../config/routes.json');
