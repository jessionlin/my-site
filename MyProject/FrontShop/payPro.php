<?php require_once '../conf/configs.php';
$id=$_REQUEST['id'];
$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
$sql = "select * from orderlist where id = '{$id}'";
$result =mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
$sql = "select * from pro where id = '{$row['proid']}'";
$result =mysqli_query($link, $sql);
$row1 = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div style="width:100%;height:60px;background-color: #5B00AE;position:relative;top:-50px;align:center;color:#FFFFFF;font-size:50px;font-family:'隶书';text-align:center;">
<h3>15手工制品商城</h3>
</div>
<div><form action="doOrdering.php?id=<?php echo $id;?>&proid=<?php echo $row1['id'];?>&number=<?php echo $row['number'];?>" method="post">
<table  class="table" style="border-width: 1px;background-color: #BBFFBB;width:600px;font-size:30px;" cellspacing="1" cellpadding="5" border="1" align="center">
	<tr style="width: 800px;height: 50px;">
		<td width="40%">商品名称</td>
		<td width="60%"><span><?php echo $row1['name'];?></span></td>
	</tr>
	<tr style="width: 800px;height: 100px;">
		<td width="40%">商品图片</td>
		<td width="60%"><img src="<?php echo $row['proimg'];?>"></td>
	</tr>
	<tr style="width: 800px;height: 50px;">
		<td width="40%">商品价格</td>
		<td width="60%"><?php echo $row['price'];?></td>
	</tr>
	<tr style="width: 800px;height: 50px;">
		<td width="40%">商品数目</td>
		<td width="60%"><?php echo $row['number'];?></td>
	</tr>
	<tr style="width: 800px;height: 50px;">
		<td width="40%">商品总价</td>
		<td width="60%"><?php echo $row['price'] * $row['number'];?></td>
	</tr>
	<tr style="width: 800px;height: 50px;">
		<td width="40%">收件人姓名</td>
		<td width="60%"><input type="text" style="width: 100%;height: 100%;" name="recipients"></td>
	</tr>
	<tr style="width: 800px;height: 50px;">
		<td width="40%">收件地址</td>
		<td width="60%"><input type="text" style="width: 100%;height: 100%;" name="address"></td>
	</tr>
	<tr style="width: 800px;height: 50px;">
		<td width="40%">收件人号码</td>
		<td width="60%"><input type="text" style="width: 100%;height: 100%;" name="phone"></td>
	</tr>
	<tr style="width: 800px;height: 50px;">
		<td width="40%">其他说明</td>
		<td width="60%"><input type="text" style="width: 100%;height: 100%;" name="others"></td>
	</tr>
	<tr style="width: 800px;height: 50px;">
		<td width="40%"><button style="font-size: 30px;font-family: '楷体';position: relative;">确认购买</button></td>
	</tr>
</table>
</form>
</div>
</body>
</html>