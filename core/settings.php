<?php

class Settings
{
    var $config = [];

    public function __construct($config_file)
    {
        $this->config = json_decode(file_get_contents($config_file), true);
    }
}