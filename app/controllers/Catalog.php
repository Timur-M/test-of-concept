<?php

namespace Controllers;

use Core\Input;
use Core\Templater;
use Core\Db;

class Catalog
{
    var $slug;

    public function __construct()
    {
        if (isset(Input::$path_segments[1])) $this->slug = Input::$path_segments[1];// need to check
    }

    public function index()
    {

        if ($this->slug != null) {
            $data['rubric'] = Db::get("SELECT * FROM rubrics WHERE slug=?",[$this->slug]);
            $data['items'] = Db::select("SELECT * FROM items WHERE rubric_id=?",[$data['rubric']['id']]);
            Templater::display("catalog/rubric.tpl", $data);
        }
        else{
            $data['rubrics'] = Db::select("SELECT * FROM rubrics");
            Templater::display("catalog/main.tpl", $data);
        }
    }
}