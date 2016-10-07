<?php
require_once 'common.php';
require_once '../conf/configs.php';
session_start();
$name=$_SESSION['username'];
$number=$_POST['number']?$_POST['number']:$_REQUEST['number'];
echo $number;
$id=$_REQUEST['id'];
echo $id;
$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
$sql="select soldnumber,wholenumber from pro where id='{$id}'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
echo $soldnumber;
$soldnumber = (int)$row['soldnumber'] + (int)$number; 
echo $soldnumber;
if($soldnumber>$row['wholenumber']){
// 	alertMes('该商品已售完，请过段时间再购买','main.php');
}
else{
$soldnumber=(string)$soldnumber;
$sql1="update pro set soldnumber='{$soldnumber}' where id='{$id}'";
$result1=mysqli_query($link,$sql1);
$date=date("Y.m.d");
if($result1){
	$sql2="insert into pro_sold(name,proid,boughttime,amount)values ('{$name}','{$id}','{$date}','{$number}')";
$result2=mysqli_query($link,$sql2);
if($result2){
	alertMes('购买成功！','main.php');
}
}
}
/*mysqli_free_result($result);
mysqli_free_result($result1);
mysqli_free_result($result2);*/
mysqli_close($link);