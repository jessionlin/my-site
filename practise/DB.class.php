<?php
    $currentdir = dirname(__FILE__);
    include_once($currentdir.'/include.php');
    foreach($paths as $path){
        include_once($currentdir.'/'.$path);
    }

class DB{
    public static  $db;
    public static function init($dbtype,$config){
        self::$db = new $dbtype;
        self::$db ->connect($config);
    }
    public static function  query($sql){
        return self::$db->query($sql);
    }
}