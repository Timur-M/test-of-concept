<?php

spl_autoload_register(function ($class_name) {
    if(is_file('../core/'.$class_name . '.php')) include '../core/'.$class_name . '.php';
    if(is_file('../controllers/'.$class_name . '.php')) include '../controllers/'.$class_name . '.php';
});

$settings = new Settings('../config/config.json');

$db = new Db($settings);


$input = new Input();


$router = new Router($db, $input, '../config/routes.json');
