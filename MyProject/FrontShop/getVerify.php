<?php
 require_once '../lib/image.php';
 session_start();
$_SESSION['verify']=verifyImage(0,100,3,4,110,40);