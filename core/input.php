<?php

class Input
{
    var $post = [];
    var $get = [];
    var $url;
    var $uri;

    var $uri_query = '';
    var $uri_path;

    var $path_segments = [];

    public function __construct()
    {
        parse_str(file_get_contents('php://input'), $this->post);

        $this->get = $_GET;

        $this->url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $this->uri = $_SERVER['REQUEST_URI'];

        $exploded_uri = explode("?", $_SERVER['REQUEST_URI']);

        $this->uri_path = $exploded_uri[0];

        if (isset($exploded_uri[1])) $this->uri_query = $exploded_uri[1];

        $this->path_segments = explode("/",ltrim($exploded_uri[0],"/"));
    }
}