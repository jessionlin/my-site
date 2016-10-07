<?php
class NbaPlayer{
    public $name;
    function __clone(){
        $this->name='TBD';
    }
}
$james=new NbaPlayer();
$james->name='James';
echo $james->name."\n";
$james2=clone $james;
echo "Before set up: James2's".$james2->name."\n";
$james2->name = 'James2';
echo $james->name."\n";
echo $james2->name."\n";