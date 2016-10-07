<?php require_once '../conf/configs.php';?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
</head>
<body>
	<div>
	<?php $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
				$name=$_POST['name'];
				$sql="select * from pro where name='{$name}'";
				$result=mysqli_query($link,$sql);
				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				$sql1="select * from pro_img where proid='{$row['id']}'";
				$result1=mysqli_query($link,$sql1);
				$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);?><form action="action.php?act=editPro" method="post">
		<table class="mes" style="border-width: 1px;" cellspacing="2" cellpadding="6" border="1" align="center">
				<tr>
					<td align="center">商品名称：</td>
					<td align="center"><input type="text" value="<?php echo $row['name'];?>"name="name"/></td>
				</tr>
				<tr>
					<td align="center">商品厂家：</td>
					<td align="center"><input type="text" value="<?php echo $row['factory'];?>"name="factory"/></td>
				</tr>
				<tr>
					<td align="center">商品分类：</td>
					<td align="center"><input type="text" value="<?php echo $row['sort'];?>"name="sort"/></td>
				</tr>
				<tr>
					<td align="center">商品价格：</td>
					<td align="center"><input type="text" value="<?php echo $row['price'];?>"name="price"/></td>
				</tr>
				<tr>
					<td align="center">商品剩余数目：</td>
					<td align="center"><input type="text" value="<?php echo (int)$row['wholenumber']-(int)$row['soldnumber'];?>"name="number"/></td>
				</tr>
				<tr>
					<td align="center">商品详情：</td>
					<td align="center"><textarea name="details" cols="30" rows="3"><?php echo $row['details'];?></textarea></td>
				</tr>
				<tr>
					<td align="center">商品图片路径：</td>
					<td align="center"><input type="text" value="<?php echo $row1['img'];?>" name="path"/></td>
				</tr>
				<button style="width:300px;font-size:25px;height:30px;font-family:'楷体';left:615px;position:relative;" align="center">修改商品</button>
				</table></form>
					<button style="width:300px;font-size:25px;height:30px;font-family:'楷体';left:615px;position:relative;" align="center" onclick="goBack()">返回</button>
						<?php echo mysqli_close($link);?>
					</div>
</body>
<script type="text/javascript">
	function goBack(){
		window.location='listPro.php?page=1';
	}
</script>
</html>