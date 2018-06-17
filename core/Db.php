<?php

namespace Core;

use \PDO as PDO;

class Db
{
    protected static $dbh;

    private function __construct() {
        self::$dbh = new PDO("mysql:host=".Settings::get('db_host').";dbname=".Settings::get('db_name'),Settings::get('db_user'),Settings::get('db_password'));
    }

    public static function init() {
        if (self::$dbh === null) {
            new self;
        }
    }

    public static function select($sql,$params=array()) {
        $stmt = self::$dbh->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function select_obj($sql,$params=array()) {
        $stmt = self::$dbh->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function get($sql,$params=array()) {
        $stmt = self::$dbh->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function get_obj($sql,$params=array()) {
        $stmt = self::$dbh->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function insert($sql,$params) {
        $stmt = self::$dbh->prepare($sql);
        $stmt->execute($params);
        return self::$dbh->lastInsertId();
    }

    public static function update($sql,$params) {
        $stmt = self::$dbh->prepare($sql);
        $stmt->execute($params);
    }
}