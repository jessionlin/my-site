<?php
class magicTest{
    public function __toString(){
        return "This is the Class MagicTest.";
    }
    public function __invoke($x){
        echo "__invoke called with parameter ".$x."\n";
    }
    public function __call($name,$arguments){
        echo "Calling ".$name." with parameters: ".
        implode(",", $arguments)."\n";
    }
    public static function __callstatic($name,$arguments){
        echo "static calling ".$name." with parameters: ".
            implode(",", $arguments)."\n";
    }
    public function __get($name){
        return "Getting the property ".$name;
    }
    public function __set($name,$value){
        echo "Setting the property ".$name." to value ".$value."\n";
    }
    public function __isset($name){
        echo "__isset invoked\n";
        return true;
    }
    public function __unset($name){
        echo "unsetting property ".$name."\n";
    }
}


$obj=new magicTest();
echo $obj->className."\n";
$obj->clasName='magicClassX';
echo '$obj->className is set ?'.isset($obj->className)."\n";
echo '$obj->className is empty ?'.empty($obj->className)."\n";
unset($obj->className);