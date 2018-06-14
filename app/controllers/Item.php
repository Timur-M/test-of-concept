<?php

class Item
{
    var $slug;

    public function __construct()
    {
        if (isset(Input::$path_segments[1])) $this->slug = Input::$path_segments[1];// need to check
    }

    public function index()
    {
        $data['item'] = Db::get("SELECT * FROM items WHERE slug=?",[$this->slug]);
        Templater::display("items/main.tpl", $data);
    }


}