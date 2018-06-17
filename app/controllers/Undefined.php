<?php

namespace Controllers;

use Core\Input;

class Undefined
{
    var $slug;

    public function __construct()
    {
        if (isset(Input::$path_segments[0])) $this->slug = Input::$path_segments[0];// need to check
    }

    public function index()
    {
        if ($this->slug != null) {
            $page = new Page($this->slug);
            $page->index();
        }
    }
}