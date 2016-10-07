<?php
require_once 'common.php';
function checkLogin(){
    error_reporting(1);
    session_start();
    if(!($_SESSION['username'])){
        alertMes("请先登录", 'login.php');
    }
}