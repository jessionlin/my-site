<?php require_once '../conf/configs.php';
require_once '../manage/page.php';
require_once 'check.php';
checkLogin();
$username = $_SESSION['username'];
$proid = $_REQUEST['id'];
$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
	$sql="select id,name,factory,wholenumber,soldnumber,price,sort from pro where id='{$proid}'";
	$result=mysqli_query($link,$sql);
	while(($row=mysqli_fetch_array($result,MYSQLI_ASSOC))==null?0:1):?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="scripts/change.js"></script>
<script type="text/javascript" src="scripts/jquery-1.6.4.js"></script>
<script type="text/javascript" src="scripts/bigpic.js"></script>
<link type="text/css" rel="stylesheet" href="styles/details.css">
	<title>商品详细信息</title>
</head>
<body>
<div style="width:100%;height:60px;background-color: #5B00AE;position:relative;top:-50px;align:center;color:#FFFFFF;font-size:50px;font-family:'隶书';text-align:center;">
<h3>15手工制品商城</h3>
</div>
<div class="left">
	<div class="up">
	<?php $sql1="select img_4,img_1 from pro_img where proid='{$row['id']}'";
		$result1=mysqli_query($link,$sql1);
		$i = 1;
		$imgs = array();
		$img1 = null;
		while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC)):?><?php if($i<=5):?>
	<img class="bigPic" src="<?php echo '../manage/'.$row1['img_1'];?>" style="display: block;">
	<?php  $img1 = '../manage/'.$row1['img_1'];$imgs[($i-1)] = '../manage/'.$row1['img_4'];$i = $i + 1;endif;?>
	 <?php
						endwhile;
						mysqli_free_result($result1);?>
	</div>
	<div class="down"><ul><?php $j=0; while($j<count($imgs)):?><li>
	<a href="#"><img class="smallPic" src="<?php echo $imgs[$j];?>"></a></li><?php $j++;?><?php endwhile;?>
	</ul></div>
</div>
<div class="mask"></div>
<div class="transparent"></div>
<div class="big_pic"style="border: 1px solid #e00ee0;z-index: 9;"><img id="part" class="part"src="<?php echo $img1;?>"></div>
<div class="right">
	<div class="pro_name"><span><?php echo $row['name'];?></span></div><form action="addOrding.php?id=<?php echo $row['id'];?>&img=<?php echo $imgs[0];?>&price=<?php echo $row['price'];?>" method="post">
	<table class="table" style="border-width: 1px;font-size: 30px;" cellspacing="1" cellpadding="5" border="0" align="left" width="70%">
		<tr height="60px">
			<td width="40%">商品分类:</td>
			<td width="60%"><span><?php echo $row['sort'];?></span></td>
		</tr>
		<tr height="60px">
			<td width="40%">商品厂家:</td>
			<td width="60%"><span><?php echo $row['factory'];?></span></td>
		</tr>
		<tr height="60px">
			<td width="40%">商品剩余数目:</td>
			<td width="60%"><span><?php echo ($row['wholenumber']-$row['soldnumber']);?></span></td>
		</tr>
		<tr height="60px">
			<td width="40%">商品价格:</td>
			<td width="60%"><span><?php echo $row['price'];?></span></td>
					<?php 
						endwhile;
						mysqli_free_result($result);
						mysqli_close($link);?>
		</tr>
		<tr height="60px">
			<td width="40%">商品购买数目:</td>
			<td width="60%">
				<div class="num">
					<a href="#" onClick="changeNum('minus')"><div class="num-">-</div></a>
					<input type="text" value="1" id="buy_num" name="number"/>
					<a href="#" onClick="changeNum('add')"><div class="numadd" >+</div></a>
				</div>
			</td>
		</tr>
	</table>
		<div class="buying"><button>添加进购物车</button></div></from>
</div>
</body>
<script type="text/javascript">
	function changeNum(op){
		var nums =document.getElementById("buy_num");
		num = parseInt(nums.value);
		if(op=="minus"){
			if(num>1){
			num--;
			}else;
		}
		else if(op=="add"){
			num++;
		}
		nums.value=num.toString();
	}
</script>
</html>