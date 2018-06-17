<?php

namespace Core;

use Controllers;



class Router
{


    public function __construct($routes_file)
    {
        $routes = json_decode(file_get_contents($routes_file),true);

        if(isset($routes[Input::$path_segments[0]])) {
            $key = Input::$path_segments[0];
        } else {
            $key = 'undefined_route';
        }
            $route = $routes[$key];

            $class_name = "Controllers\\".$route['class'];

            $method = $route['method']; //default method from config

            $z = new Controllers\Catalog();

            $class = new $class_name();

            if(isset(Input::$path_segments[1]) and method_exists($class_name,Input::$path_segments[1])){ // if method was specified in url
                $method = Input::$path_segments[1];
            }

            $class->$method();

    }
}