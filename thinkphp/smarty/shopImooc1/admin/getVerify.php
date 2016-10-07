<?php 
require_once '../include.php';
session_start();
$_SESSION['verify']=verifyImage();