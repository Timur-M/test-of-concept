<?php

class Db
{
    var $db;

    public function __construct(Settings $settings) {
        $this->db = new PDO("mysql:host=".$settings->config['db_host'].";dbname=".$settings->config['db_name'],$settings->config['db_user'],$settings->config['db_password']);
    }

    public function select_all($sql,$params=array()) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function select_all_to_objects($sql,$params=array(),$class_name) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_CLASS,$class_name);
    }

    public function select_one($sql,$params=array()) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($sql,$params) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $this->db->lastInsertId();
    }

    public function update($sql,$params) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
    }
}