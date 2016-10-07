<?php
require_once 'common.php';
require_once '../conf/configs.php';
require_once 'check.php';
checkLogin();
$act=$_REQUEST['act'];
if($act=="userOut"){
	session_start();
	$_SESSION['loginFlag']=0;
	alertMes("返回初始页面","main.php");
}

/*修改学生信息*/

elseif($act=="editUser"){
	$name=$_POST['name'];
$password=md5($_POST['password']);
$truename=$_POST['truename'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$photo=$_POST['photo'];
$QQ=$_POST['QQ'];
$hobby=$_POST['hobby'];
$sex=(int)$_POST['sex'];
$address=$_POST['address'];
$address_1=$_POST['address_1'];
$address_2=$_POST['address_2'];
$address_3=$_POST['address_3'];
$address_4=$_POST['address_4'];
$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
$sql="select * from user where name='{$name}'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
if($row){
	$sql="delete from user where name ='{$name}'";
	$result=mysqli_query($link,$sql);
	$sql="insert into user(name,truename,password,email,phone,photo,QQ,hobby,sex,address)values('{$name}','{$truename}',
			'{$password}','{$email}','{$phone}','{$photo}','{$QQ}','{$hobby}','{$sex}','{$address}')";
$result=mysqli_query($link,$sql);
$sql="insert into useraddress(name,address_1,address_2,address_3,address_4) values('{$name}','{$address_1}',
			'{$address_2}','{$address_3}','{$address_4}')";
$result=mysqli_query($link,$sql);
mysqli_close($link);
}
else{
	mysqli_close($link);
	 echo "<script>alert('更改失败，重新更改');</script>";
}
}elseif($act == "feedback"){
	$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
	$proName=$_POST['pro_name'];
	$comment = $_POST['comment'];
	$name = $_SESSION['username'];
	$sql = "select id from pro where name='{$proName}'";
	$result = mysqli_query($link,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$sql1 = "select img from pro_img where proid = '{$row['id']}'";
	$result1 = mysqli_query($link,$sql1);
	$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
	$sql2 = "insert into user_feedback(name,pro_name,pro_img,comment) values ('{$name}','{$proName}','{$row1['img']}','{$comment}')";
	$result2 = mysqli_query($link,$sql2);
	if($result2){
		alertMes('提交成功','main.php');
	}
	else{alertMes('提交失败','main.php');}
	mysqli_close($link);
}

?>
