<?php
 require_once '../lib/image.php';
 session_start();
 header("content-type:text/html;charset = utf-8");
$_SESSION['verify']=verifyImage(0,100,3,4,110,40);
