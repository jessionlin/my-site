<?php
session_start();
require_once 'common.php';
require_once '../conf/configs.php';
$username=$_POST['username'];
$username=addslashes($username);
$password=md5($_POST['password']);
$email=$_POST['email'];
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
echo $verify1;
if($verify==$verify1){
	$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
	$sql="select * from user where name='{$username}'";
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if((!$row)&&($username!=null)){
		$sql1="insert into user(name,password,email)values('{$username}','{$password}','{$email}')";
		$result = mysqli_query($link, $sql1);
		alertMes("注册成功，准备登录","login.php");
	}else{
		alertMes("用户名已存在,注册失败,重新注册","reg.php");
	}
}else{
	alertMes("验证码错误，重新注册","reg.php");
}
mysqli_free_result($result);
mysqli_close($link);