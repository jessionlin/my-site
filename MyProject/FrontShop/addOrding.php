<?php require_once '../conf/configs.php';
require_once 'common.php';
error_reporting(0);
session_start();
$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
$id = $_REQUEST['id'];
$username = $_SESSION['username'];
$number = $_POST['number'];
$img = $_REQUEST['img'];
$price = $_REQUEST['price'];
$sql="insert into orderlist(username,proid,ifpaid,proimg,ifDelivery,price,number)values('{$username}',{$id},0,'{$img}',0,{$price},{$number})";
$result=mysqli_query($link, $sql);
$row=mysqli_fetch_array($result);
if(!$row)
alertMes('添加成功', 'main.php');