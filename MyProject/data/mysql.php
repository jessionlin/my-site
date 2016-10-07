<?php 
/*创建网页所需数据库
Host : localhost     database : myproject
*/
require_once '../conf/configs.php';
$db_host = DB_HOST;
$db_user = DB_USER;
$db_password = DB_PWD;
$db_name = DB_DBNAME;


/*创建数据库myproject*/

$link =new mysqli($db_host,$db_user,$db_password);
if($link->connect_error){
	die("Connection failed: " . $link->connect_error);
}
$sql = " create database {$db_name}";
if($link->query($sql)=== true){
  echo "Database created successfully";
} else {
    echo "Error creating database: " . $link->error;
}
mysqli_close($link);

/*创建用户表user*/
$sql = "
	CREATE TABLE user (
  id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(30) NOT NULL,
  password char(40) NOT NULL,
  email varchar(50) NOT NULL,
  phone varchar(30),
  QQ varchar(15) ,
  sex tinyint(4) ,
  address varchar(30) ,
  hobby varchar(50) ,
  photo varchar(40) ,
  logFlag tinyint(4) ,
  truename varchar(3),
  PRIMARY KEY (`id`)
)";
$link = mysqli_connect($db_host,$db_user,$db_password,$db_name);
if($link->query($sql)===true){
	echo "table user created successfully";
	$password = md5(19970115);
$sql = "insert into user(name,password,email)values ('jession','{$password}','1754317747@qq.com')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store';}
}else{
	echo "error creating table:".$link->error;
}


/*创建管理员表admin*/
$sql = "
	CREATE TABLE admin (
  id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(30) NOT NULL,
  password char(40) NOT NULL,
  email varchar(50) NOT NULL,
  phone varchar(30),
  QQ varchar(15) ,
  sex tinyint(4) ,
  address varchar(30) ,
  hobby varchar(50) ,
  photo varchar(40) ,
  job varchar(30) ,
  truename varchar(3),
  PRIMARY KEY (`id`)
)";
if($link->query($sql)===true){
	echo "table admin created successfully";
	$password = md5(19970115);
$sql = "insert into admin(name,password,email) values ('jession','{$password}','1754317747@qq.com')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeaded store';}
}else{
	echo "error creating table:".$link->error;
}

/*创建用户创新建议表*/
$sql = "
	CREATE TABLE createadv (
  id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(30) ,
createtime date ,
details varchar(50),
  PRIMARY KEY (`id`)
)";
if($link->query($sql)===true){
	echo "table createadv created successfully";
}else{
	echo "error creating table:".$link->error;
}


/*创建商品表*/
$sql = "
	CREATE TABLE pro (
  id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(30) ,
  factory varchar(50) ,
  wholenumber int(11) ,
  soldnumber int(11) ,
  details varchar(50),
  sort varchar(40),
  price float,
  PRIMARY KEY (`id`)
)";
if($link->query($sql)===true){
	echo "table pro created successfully";
}else{
	echo "error creating table:".$link->error;
}


/*创建商品图片表*/
$sql = "
	CREATE TABLE pro_img (
  id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  proid int(11) ,
img varchar(30) ,
img_2 varchar(45) ,
img_3 varchar(45) ,
img_4 varchar(45) ,
img_1 varchar(45),
  PRIMARY KEY (`id`)
)";
if($link->query($sql)===true){
	echo "table pro_img created successfully";
}else{
	echo "error creating table:".$link->error;
}
/*创建商品定制表*/
$sql = "
	CREATE TABLE pro_ord (
  id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(30) ,
material varchar(30) ,
size varchar(30) ,
ordertime date ,
timelimited varchar(30) ,
comment varchar(50),
  PRIMARY KEY (`id`)
)";
if($link->query($sql)===true){
	echo "table pro_ord created successfully";
}else{
	echo "error creating table:".$link->error;
}

/*创建商品售出表*/
$sql = "
	CREATE TABLE pro_sold (
  id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(30) ,
proid int(11) ,
amount int(11) ,
boughttime date,
  PRIMARY KEY (`id`)
)";
if($link->query($sql)===true){
	echo "table pro_sold created successfully";
}else{
	echo "error creating table:".$link->error;
}

/*创建用户评价反馈表*/
$sql = "
	CREATE TABLE user_feedback (
  id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(45) ,
pro_name varchar(45) ,
pro_img varchar(45) ,
comment varchar(45),
  PRIMARY KEY (`id`)
)";
if($link->query($sql)===true){
	echo "table user_feedback created successfully";
}else{
	echo "error creating table:".$link->error;
}


/*创建用户邮寄地址表*/
$sql = "
	CREATE TABLE useraddress (
  id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(30) ,
address_1 varchar(50) ,
address_2 varchar(50) ,
address_3 varchar(50) ,
address_4 varchar(50),
  PRIMARY KEY (`id`)
)";
if($link->query($sql)===true){
	echo "table useraddress created successfully";
}else{
	echo "error creating table:".$link->error;
}

/*创建用户意见表*/
$sql = "
	CREATE TABLE useradv (
  id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  username varchar(30) ,
date date ,
details varchar(100),
  PRIMARY KEY (`id`)
)";
if($link->query($sql)===true){
	echo "table useadv created successfully";
}else{
	echo "error creating table:".$link->error;
}

/*创建订单列表*/
$sql = "
	CREATE TABLE orderlist (
  id tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  username varchar(30) NOT NULL, 
proid int(11) NOT NULL ,
ifpaid int(2) NOT NULL,
proimg varchar(60) ,
ifDelivery int(11) ,
price float ,
number int(11) ,
recipients varchar(30) ,
address varchar(45) ,
phone varchar(45) ,
others varchar(45),
  PRIMARY KEY (`id`)
)";
if($link->query($sql)===true){
    echo "table orderlist created successfully";
}else{
    echo "error creating table:".$link->error;
}

/*向orderlist中添加数据*/
$sql = "insert into orderlist(username,proid,ifpaid,proimg,ifDelivery,price,number)values('jession',12,0,'image/image_4/201.jpg',0,5,2)";
if($link->query($sql)){
    echo 'successfully store';
}else{echo 'defeated store'.$link->error;}
/*向createadv中添加数据*/
$sql = "insert into createadv(name,createtime,details) values('jession','2016.04.25','添加一些精美图片')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}

/*向useradv中添加数据*/
$sql = "insert into useradv(username,date,details) values('jession','2016.04.26','添加一些精美图片')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
/*向useraddress中添加数据*/
$sql = "insert into useraddress(name,address_1) values('jession','黑龙江省鸡西市')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
/*向user_feedback中添加数据*/
$sql = "insert into user_feedback(name,pro_name,pro_img,comment) values('jession','熊','img/202.jpg','有趣')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into user_feedback(name,pro_name,pro_img,comment) values('jession','熊','img/202.jpg','有趣')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into user_feedback(name,pro_name,pro_img,comment) values('jession','熊','img/202.jpg','有趣')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into user_feedback(name,pro_name,pro_img,comment) values('jession','熊','img/202.jpg','有趣')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into user_feedback(name,pro_name,pro_img,comment) values('jession','熊','img/202.jpg','有趣')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into user_feedback(name,pro_name,pro_img,comment) values('jession','熊','img/202.jpg','有趣')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into user_feedback(name,pro_name,pro_img,comment) values('jession','熊','img/202.jpg','有趣')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into user_feedback(name,pro_name,pro_img,comment) values('jession','熊','img/202.jpg','有趣')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into user_feedback(name,pro_name,pro_img,comment) values('jession','熊','img/202.jpg','有趣')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
/*向pro_sold中添加数据*/
$sql = "insert into pro_sold(name,proid,amount,boughttime) values('jession','3','3','2016.03.30')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
/*向pro_ord中添加数据*/
$sql = "insert into pro_ord(name,material,size,ordertime,timelimited,comment) values('jession','金属','0.75dm^3-1.00dm^3','2016.03.30','3-5日','')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
/*向pro中添加数据*/
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('绿色之花','1号工厂',20,1,'由5朵绿色小花构成','民族传统手工制品',6)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('红灯笼','1号工厂',20,0,'有两种类型，不规则形和长方体','民族传统手工制品',6)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('窗花','2号工厂',20,0,'有两种类型，分别对应两种不同的花型','民族传统手工制品',6)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('瓷瓶','3号工厂',20,3,'瓷器为中国古代传统文艺，保留至今','民族传统手工制品',125)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('窗花_2','4号工厂',20,0,'记录了某个著名人物','民族传统手工制品',6)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('窗花_3','4号工厂',20,0,'贴在窗花上彰显了其祥和的一面','民族传统手工制品',3)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('布徽','5号工厂',20,2,'用布按照一个徽章的形式，将龙形显于其上，体现君权至上','民族传统手工制品',6)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('石币','5号工厂',20,2,'在硬币大小的泥土上刻出放牧图，体现农耕文明','民族传统手工制品',10)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('贺卡','5号工厂',20,3,'在贺卡中央添加一棵树的图案，富有新意','创意手工制品',5)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('熊','5号工厂',20,4,'用废弃物制作了一个熊的立体图','创意手工制品',3)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('飞船','5号工厂',20,1,'用废弃物制作了一个宇宙飞船的立体图','创意手工制品',5)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('心_1','6号工厂',20,7,'充满浪漫的心','情人节手工制品',20)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('心_2','6号工厂',20,8,'情人爱情的象征','情人节手工制品',20)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('爱心台灯','6号工厂',20,7,'情人的爱如台灯一般明亮','情人节手工制品',30)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('纸艺','7号工厂',20,0,'儿童总是心灵手巧的','儿童手工制品',2)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('鸡','7号工厂',20,0,'豆子拼成的鸡充满了丰收的喜悦','儿童手工制品',2)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('椅子','7号工厂',20,0,'儿童总是充满幻想，想象出与众不同的椅子','儿童手工制品',2)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('衣饰','8号工厂',20,1,'不一样的材料，不一样的韵味','手工服饰',25)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('衣饰_1','8号工厂',20,1,'不一样的材料，不一样的感觉','手工服饰',25)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('手工服饰','8号工厂',20,1,'手工的，才是最舒适的','手工服饰',75)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('火车头','9号工厂',20,2,'火车头，代表不羁的灵魂','金属手工制品',110)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('摩托车_1','9号工厂',20,4,'让人想起二战的岁月','金属手工制品',110)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('摩托车_2','9号工厂',20,5,'时代在进步','金属手工制品',110)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('摩托车_3','9号工厂',20,5,'车，也需要尊重','金属手工制品',110)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('机器人','10号工厂',20,4,'机器人，重要的伙伴','金属手工制品',70)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('老爷车','10号工厂',20,5,'飞速发展的社会','金属手工制品',110)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('家居用品','11号工厂',20,2,'家的缩影','木制品',60)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('采油机','11号工厂',20,3,'大庆油田','木制品',55)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('战斗机','11号工厂',20,2,'空军的主力','木制品',45)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('预警机','11号工厂',20,2,'空军的眼睛','木制品',45)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('精品小房子','11号工厂',20,2,'父亲节的小礼物','创意手工制品',45)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro(name,factory,wholenumber,soldnumber,details,sort,price) values('脸谱','11号工厂',20,2,'京剧的代表特征之一，拥有悠久的历史','民族传统手工制品',45)";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
/*向pro_img中添加数据*/
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(1,'img/101.jpg','image/image_1/101.jpg','image/image_2/101.jpg','image/image_3/101.jpg','image/image_4/101.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(2,'img/102.jpg','image/image_1/102.jpg','image/image_2/102.jpg','image/image_3/102.jpg','image/image_4/102.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(3,'img/103.jpg','image/image_1/103.jpg','image/image_2/103.jpg','image/image_3/103.jpg','image/image_4/103.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(4,'img/105.jpg','image/image_1/105.jpg','image/image_2/105.jpg','image/image_3/105.jpg','image/image_4/105.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(5,'img/106.jpg','image/image_1/106.jpg','image/image_2/106.jpg','image/image_3/106.jpg','image/image_4/106.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(6,'img/107.jpg','image/image_1/107.jpg','image/image_2/107.jpg','image/image_3/107.jpg','image/image_4/107.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(7,'img/108.jpg','image/image_1/108.jpg','image/image_2/108.jpg','image/image_3/108.jpg','image/image_4/108.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(8,'img/109.jpg','image/image_1/109.jpg','image/image_2/109.jpg','image/image_3/109.jpg','image/image_4/109.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(9,'img/201.jpg','image/image_1/201.jpg','image/image_2/201.jpg','image/image_3/201.jpg','image/image_4/201.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(10,'img/202.jpg','image/image_1/202.jpg','image/image_2/202.jpg','image/image_3/202.jpg','image/image_4/202.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(11,'img/203.jpg','image/image_1/203.jpg','image/image_2/203.jpg','image/image_3/203.jpg','image/image_4/203.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(12,'img/301.jpg','image/image_1/301.jpg','image/image_2/301.jpg','image/image_3/301.jpg','image/image_4/301.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(13,'img/302.jpg','image/image_1/302.jpg','image/image_2/302.jpg','image/image_3/302.jpg','image/image_4/302.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(14,'img/303.jpg','image/image_1/303.jpg','image/image_2/303.jpg','image/image_3/303.jpg','image/image_4/303.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(15,'img/401.jpg','image/image_1/401.jpg','image/image_2/401.jpg','image/image_3/401.jpg','image/image_4/401.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(16,'img/402.jpg','image/image_1/402.jpg','image/image_2/402.jpg','image/image_3/402.jpg','image/image_4/402.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(17,'img/403.jpg','image/image_1/403.jpg','image/image_2/403.jpg','image/image_3/403.jpg','image/image_4/403.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(18,'img/501.jpg','image/image_1/501.jpg','image/image_2/501.jpg','image/image_3/501.jpg','image/image_4/501.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(19,'img/502.jpg','image/image_1/502.jpg','image/image_2/502.jpg','image/image_3/502.jpg','image/image_4/502.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(20,'img/503.jpg','image/image_1/503.jpg','image/image_2/503.jpg','image/image_3/503.jpg','image/image_4/503.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(21,'img/601.jpg','image/image_1/601.jpg','image/image_2/601.jpg','image/image_3/601.jpg','image/image_4/601.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(22,'img/602.jpg','image/image_1/602.jpg','image/image_2/602.jpg','image/image_3/602.jpg','image/image_4/602.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(23,'img/603.jpg','image/image_1/603.jpg','image/image_2/603.jpg','image/image_3/603.jpg','image/image_4/603.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(24,'img/604.jpg','image/image_1/604.jpg','image/image_2/604.jpg','image/image_3/604.jpg','image/image_4/604.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(25,'img/605.jpg','image/image_1/605.jpg','image/image_2/605.jpg','image/image_3/605.jpg','image/image_4/605.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(26,'img/606.jpg','image/image_1/606.jpg','image/image_2/606.jpg','image/image_3/606.jpg','image/image_4/606.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(27,'img/701.jpg','image/image_1/701.jpg','image/image_2/701.jpg','image/image_3/701.jpg','image/image_4/701.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(28,'img/702.jpg','image/image_1/702.jpg','image/image_2/702.jpg','image/image_3/702.jpg','image/image_4/702.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(29,'img/704.jpg','image/image_1/704.jpg','image/image_2/704.jpg','image/image_3/704.jpg','image/image_4/704.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(30,'img/703.jpg','image/image_1/703.jpg','image/image_2/703.jpg','image/image_3/703.jpg','image/image_4/703.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(31,'img/204.jpg','image/image_1/204.jpg','image/image_2/204.jpg','image/image_3/204.jpg','image/image_4/204.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}
$sql = "insert into pro_img(proid,img,img_1,img_2,img_3,img_4) values(32,'img/104.jpg','image/image_1/104.jpg','image/image_2/104.jpg','image/image_3/104.jpg','image/image_4/104.jpg')";
	if($link->query($sql)){
		echo 'successfully store';
	}else{echo 'defeated store'.$link->error;}