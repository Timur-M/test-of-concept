<?php

class Router
{


    public function __construct(Db $db, Input $input, $routes_file)
    {
        $routes = json_decode(file_get_contents($routes_file),true);

        $route = $routes[$input->path_segments[0]];

        $class_name = $route['class'];
        $method = $route['method'];

        $class = new $class_name($db, $input);

        $class->$method();
    }
}