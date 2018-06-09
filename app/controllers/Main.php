<?php

class Main
{
    var $params;
    var $db;

    public function __construct(Db $db, Input $params)
    {
        $this->params = $params;
        $this->db = $db;
    }

    public function index()
    {
        var_dump($this->params);

        $sql = "SELECT * FROM materials";
        $query = $this->db->select_all($sql);

        echo '<pre>';
        var_dump($query);
        echo '</pre>';
    }
}