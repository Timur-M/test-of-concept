<?php

namespace Controllers;

use Core\Templater;

class Main
{


    public function __construct()
    {
        //
    }

    public function index()
    {
        $data['test'] = '';
        Templater::display("main.tpl", $data);
    }
}