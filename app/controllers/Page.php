<?php

namespace Controllers;

use Core\Db;
use Core\Templater;

class Page
{
    var $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function index()
    {
        $data['page'] = Db::get("SELECT * FROM pages WHERE slug=?",[$this->slug]);
        if ($data['page']) {
            Templater::display("pages/main.tpl", $data);
        } else {
            header('HTTP/1.0 404 Not Found');
            echo '404: Page not found';
        }
    }


}