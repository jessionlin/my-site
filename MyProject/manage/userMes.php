<?php require_once '../conf/configs.php';?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
</style>
	<title></title>
</head>
<body><form action="action.php?act=editUser" method="post">
	<div class="user_mes">
	<?php $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
				$name=$_POST['name'];
				$sql="select * from user where name='{$name}'";
				$result=mysqli_query($link,$sql);
				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);?>
				<table class="mes" style="border-width: 1px;" cellspacing="2" cellpadding="7" border="1" align="center" height="600px;">
					<tr>
						<td align="center">用户头像：</td>
						<td align="center"><input type="text" value="<?php echo $row['photo'];?>" name="photo"/></td>
					</tr>
					<tr>
						<td align="center">用户昵称：</td>
						<td align="center"><input type="text" value="<?php echo $row['name'];?>" name="name"/></td>
					</tr>
					<tr>
						<td align="center">用户真实姓名：</td>
						<td align="center"><input type="text" value="<?php echo $row['truename'];?>" name="truename"/></td>
					</tr>
					<tr>
						<td align="center">用户密码：</td>
						<td align="center"><input type="password" value="<?php echo $row['password'];?>" name="password"/></td>
					</tr>
					<tr>
						<td align="center">用户邮箱：</td>
						<td align="center"><input type="text" value="<?php echo $row['email'];?>" name="email"/></td>
					</tr>
					<tr>
						<td align="center">用户QQ：</td>
						<td align="center"><input type="text" value="<?php echo $row['QQ'];?>" name="QQ"/></td>
					</tr>
					<tr>
						<td align="center">用户手机号：</td>
						<td align="center"><input type="text" value="<?php echo $row['phone'];?>" name="phone"/></td>
					</tr>
					<tr>
						<td align="center">用户地址：</td>
						<td align="center"><input type="text" value="<?php echo $row['address'];?>" name="address"/></td>
					</tr>
					<tr>
						<td align="center">用户爱好：</td>
						<td align="center"><textarea rows="3" cols="30" name="hobby"><?php echo $row['hobby'];?></textarea></td>
					</tr>
						<?php $sql1="select * from useraddress where name='{$name}'";
						$result1=mysqli_query($link,$sql1);
						$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
						?>
					<tr>
						<td align="center">用户邮寄地址1：</td>
						<td align="center"><textarea rows="3" cols="30" name="address_1"><?php echo $row1['address_1'];?></textarea></td>
					</tr>
					<tr>
						<td align="center">用户邮寄地址2：</td>
						<td align="center"><textarea rows="3" cols="30" name="address_2"><?php echo $row1['address_2'];?></textarea></td>
					</tr>
					<tr>
						<td align="center">用户邮寄地址3：</td>
						<td align="center"><textarea rows="3" cols="30" name="address_3"><?php echo $row1['address_3'];?></textarea></td>
					</tr>
					<tr>
						<td align="center">用户邮寄地址4：</td>
						<td align="center"><textarea rows="3" cols="30" name="address_4"><?php echo $row1['address_4'];?></textarea></td>
					</tr>
					<button  align="center"style="width:300px;font-size:25px;height:30px;font-family:'楷体';left:615px;position:relative;">更改</button>
				</table></div></form>
					<button onclick="goList()" align="center"style="width:300px;font-size:25px;height:30px;font-family:'楷体';left:615px;position:relative;">返回</button>
				<?php mysqli_close($link);?>
				
				
</body>
<script type="text/javascript">
	function goList(){
		window.location='listUser.php?page=1';
	}
</script>
</html>