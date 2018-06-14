<?php

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