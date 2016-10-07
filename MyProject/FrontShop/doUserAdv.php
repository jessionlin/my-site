<?php
require_once 'common.php';
require_once '../conf/configs.php';
require_once 'check.php';
checkLogin();
$name=$_SESSION['username'];
$details=$_POST['details'];
if($details==null) {
	alertMes('建议内容不得为空','main.php');
}
else{
	$date=date("Y.m.d");
$link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
$sql="insert into useradv(username,details,date) values('{$name}','{$details}','{$date}')";
$result = mysqli_query($link, $sql);
$id=mysqli_insert_id($link);
if($id>0){
	alertMes('提交成功，返回主页面','main.php');
}
else{
	alertMes('提交失败，重新提交','main.php');
}

mysqli_free_result($result);
mysqli_close($link);
}