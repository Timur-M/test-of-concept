<?php

class Catalog
{
    var $input;
    var $db;
    var $fenom;
    var $rubric_id = 0;

    public function __construct(Db $db, Input $input, Fenom $fenom)
    {
        $this->input = $input;
        $this->db = $db;
        $this->fenom = $fenom;

        if (isset($input->path_segments[1]) and is_numeric($input->path_segments[1])) $this->rubric_id = $input->path_segments[1];
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
            'materials' => $this->db->select_all($sql,[$this->rubric_id])
        ];

        $this->fenom->display("test.tpl", $data);
    }
}