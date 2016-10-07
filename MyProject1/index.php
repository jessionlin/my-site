<?php

class goods{
     public $name="goods";
     public $price;
     function sell(){
         echo $this->name." was sold!";
     }
}


class Phone  extends goods{
    public $kind;
    public $makeTime;  
    public $people;
    
    function  __construct($kind,$name,$makeTime,$price,$people){
        $this->kind=$kind;
        $this->name=$name;
        $this->makeTime=$makeTime;
        $this->price=$price;
        $this->people=$people;
    }
    
    public function call($sb){
        echo "call ".$sb;
    }
    
    public function called($sb){
        echo "called by ".$sb;
    }
    
    function __destruct(){
        echo "\ndestroyed ";
    }
}

$smartPhone=new Phone("华为", "V8", "2016-5-12", 2499, "all");
echo $smartPhone->call("tom")."\n";
echo $smartPhone->called("Tom")."\n";
echo $smartPhone->kind."\n";
echo $smartPhone->name."\n";
echo $smartPhone->makeTime."\n";
echo $smartPhone->price."\n";
echo $smartPhone->people."\n";
echo $smartPhone->sell();