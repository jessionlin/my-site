<?php
$array_1=array();
$array_2=array();

$array_1['username'] = "ericwolf";
$array_1['age'] = 25;

$array_2['member'][1]['username']="ericwolf";
$array_2['member'][1]['age']=25;

$array_2['member'][2]['username']="yuanminghe";
$array_2['member'][2]['age']=26;

class muke{
    public $name="public Name";
    protected $ptName = "protected Name";
    private $pName = "private Name";
    
    public  function getName(){
        return $this->name;
    }
}

$mukeObj = new muke();

$jsonObj = json_encode($mukeObj);

$jsonStr = '{"key":"value","key1":"value1"}';
$jsonArray = json_decode($jsonStr,true);

var_dump($jsonArray);