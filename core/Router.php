<?php

class Router
{


    public function __construct($routes_file)
    {
        $routes = json_decode(file_get_contents($routes_file),true);

        $route = $routes[Input::$path_segments[0]];

        $class_name = $route['class'];
        $method = $route['method'];

        $class = new $class_name();

        $class->$method();
    }
}