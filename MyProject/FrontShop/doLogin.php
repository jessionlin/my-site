<?php
require_once 'common.php';
require_once '../conf/configs.php';
session_start();
$username=$_POST['username'];
/*$username=addslashes($username);*/
$password=md5($_POST['password']);
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
if($verify==$verify1){
	$sql="select * from user where name='{$username}' and password='{$password}'";
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if($row){
		$_SESSION['loginFlag']=1;
		$_SESSION['username']=$username;
		alertMes('登陆成功','main.php');
	}else{
		alertMes('登陆失败,重新登录','login.php');
	}
}else{
	alertMes('验证码错误,重新登录','login.php');
}
mysqli_free_result($result);
mysqli_close($link);