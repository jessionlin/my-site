<?php 
require_once 'page.php';
require_once 'common.php';
require_once '../conf/configs.php';
$act=$_REQUEST['act'];

/*添加用户*/
if($act=="addUser"){
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
if(!$row){
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
	 echo "<script>alert('用户名已存在，重新注册');</script>";
}
}
/*添加管理员*/
elseif($act=="addAdm"){
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
$job=$_POST['job'];
$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
$sql="select * from admin where name='{$name}'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
if(!$row&&($name!=null)&&($password!=null)){
	$sql="insert into admin(name,truename,password,email,phone,photo,QQ,hobby,sex,address,job)values('{$name}','{$truename}',
			'{$password}','{$email}','{$phone}','{$photo}','{$QQ}','{$hobby}','{$sex}','{$address}','{$job}')";
	$result=mysqli_query($link,$sql);
	echo "<script>alert('添加成功');</script>";
	mysqli_close($link);
}
else{
	mysqli_close($link);
	 echo "<script>alert('用户名已存在，重新注册');</script>";
}
}

/*修改管理员信息*/
elseif($act=="editAdm"){
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
$job=$_POST['job'];
$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
$sql="select * from admin where name='{$name}'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
if($row){
	$sql="delete from admin where name ='{$name}'";
	$result=mysqli_query($link,$sql);
	$sql="insert into admin(name,truename,password,email,phone,photo,QQ,hobby,sex,address,job)values('{$name}','{$truename}',
			'{$password}','{$email}','{$phone}','{$photo}','{$QQ}','{$hobby}','{$sex}','{$address}','{$job}')";
	$result=mysqli_query($link,$sql);
	echo "<script>alert('更改成功');</script>";
	mysqli_close($link);
}
else{
	mysqli_close($link);
	 echo "<script>alert('用户名不存在，重请先注册');</script>";
}
}

/*添加商品*/
elseif($act=="addPro"){
	$name=$_POST['name'];
$factory=$_POST['factory'];
$number=(int)$_POST['number'];
$sort=$_POST['sort'];
$details=$_POST['details'];
$price=$_POST['price'];
$path="img".$_POST['path'];
$path_1=realiseImage($path,500,508);
$path_2=realiseImage($path,250,300);
$path_3=realiseImage($path,200,200);
$path_4=realiseImage($path,100,100);
$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
$sql="select * from pro where name='{$name}'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
if($name==null||$factory==null||$number==null||$sort==null||$details==null||$path==null){
	alertMes('请填写好全部信息','addPro.php');
}
else{
if(!$row){
	$sql="insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('{$name}',
			'{$factory}','{$number}','0','{$details}','{$sort}','{$price}')";
	$result=mysqli_query($link,$sql);
	$id= mysqli_insert_id($link);
	 if($id!=null){
		$sql="insert into pro_img(proid,img,img_1,img_2,img_3,img_4)values('{$id}','{$path}','{$path_1}','{$path_2}','{$path_3}','{$path_4}')";
		$result1=mysqli_query($link,$sql);
		alertMes('添加成功','addPro.php');
	 }
}else{
	 alertMes('添加失败,重新添加','addPro.php');
}
}
mysqli_close($link);
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
}

/*修改商品*/
elseif($act=="editPro"){
	$name=$_POST['name'];
$factory=$_POST['factory'];
$number=(int)$_POST['number'];
$sort=$_POST['sort'];
$details=$_POST['details'];
$price=$_POST['price'];
$path=$_POST['path'];
$path_1=realiseImage($path,500,508);
$path_2=realiseImage($path,250,300);
$path_3=realiseImage($path,200,200);
$path_4=realiseImage($path,100,100);
$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
$sql="select * from pro where name='{$name}'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
if($name==null||$factory==null||$number==null||$sort==null||$details==null||$path==null){
	alertMes('请填写好全部信息','addPro.php');
}
else{
if($row){
	$sql="delete from pro where name ='{$name}'";
	$result=mysqli_query($link,$sql);
	$sql="insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('{$name}',
			'{$factory}','{$number}','0','{$details}','{$sort}','{$price}')";
	$result=mysqli_query($link,$sql);
	$id= mysqli_insert_id($link);
	 if($id!=null){
		$sql="insert into pro_img(proid,img,img_1,img_2,img_3,img_4)values('{$id}','{$path}','{$path_1}','{$path_2}','{$path_3}','{$path_4}')";
		$result1=mysqli_query($link,$sql);
		alertMes('修改成功','addPro.php');
	 }
}else{
	 alertMes('修改失败,重新修改','addPro.php');
}
}
mysqli_close($link);
}