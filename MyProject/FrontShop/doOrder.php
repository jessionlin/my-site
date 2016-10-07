<?php
require_once 'common.php';
require_once '../conf/configs.php';
require_once 'check.php';
checkLogin();
$name=$_SESSION['username'];
echo $name;
$material=$_POST['material'];
echo $material;
$size=$_POST['size'];
echo $size;
$time=$_POST['time'];
echo $time;
$comment=$_POST['comment'];
echo $comment;
$date=date("Y.m.d");
$comment=$_POST['comment'];
if($material==1){
	$material="纸质";
}elseif($material==2){
	$material="金属";
}
elseif($material==3){
	$material="塑料";
}
elseif($material==4){
	$material="植物制品";
}
elseif($material==5){
	$material="动物制品";
}
elseif($material==6){
	$material="木制品";
}
echo $date;

if($size==1){
	$size="0.5dm^3以内";
}elseif($size==2){
	$size="0.5dm^3-0.75dm^3";
}elseif($size==3){
	$size="0.75dm^3-1.00dm^3";
}elseif($size==4){
	$size="1.00dm^3-1.25dm^3";
}elseif($size==5){
	$size="1.25dm^3-1.50dm^3";
}

if($time==1){
	$time="1日";
}elseif($time==2){
	$time="1-3日";
}elseif($time==3){
	$time="3-5日";
}elseif($time==4){
	$time="5-7日";
}elseif($time==5){
	$time="7日以上";
}
	$link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
$sql="insert into pro_ord(name,material,size,ordertime,timelimited,comment)values('{$name}','{$material}','{$size}','{$date}','{$time}','{$comment}')";
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
