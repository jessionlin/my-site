<?php
require_once 'upload.func.php';
header("content-type:text/html;charset=utf-8");
require_once '../lib/string.func.php';
$fileInfo=$_FILES['myFile'];
$info=ploadFile($fileInfo);