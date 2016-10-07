<?php
function connect($config){
    extract($config);
    if(!($link = mysqli_connect($dbhost,$dbuser,$dbpsw,$dbname))){
        $this->err(mysqli_error($link));
    }
}