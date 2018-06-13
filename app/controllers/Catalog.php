<?php

class Catalog
{
    var $rubric_id = 0;

    public function __construct()
    {
        if (isset(Input::$path_segments[1]) and is_numeric(Input::$path_segments[1])) $this->rubric_id = Input::$path_segments[1];
    }

    public function index()
    {

        if ($this->rubric_id) $this->rubric();
        else{
            $sql = "SELECT * FROM materials";
        }
    }

    public function rubric()
    {
        $sql = "SELECT * FROM materials WHERE id=?";

        $data = [
            'materials' => Db::select($sql,[$this->rubric_id])
        ];

        Templater::display("test.tpl", $data);
    }
}