<?php
require_once 'upload.func.php';
header("content-type:text/html;charset=utf-8");
require_once '../lib/string.func.php';
foreach($_FILES as $val){
    $mes=uploadFile($val);
}