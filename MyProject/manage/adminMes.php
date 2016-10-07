<?php session_start();require_once '../conf/configs.php';?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
</style>
	<title></title>
</head>
<body>
	<div><form action="action.php?act=editAdm" method="post">
		<?php $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
				$name=$_SESSION['admin'];
				$sql="select * from admin where name='{$name}'";
				$result=mysqli_query($link,$sql);
				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);?>
		<table class="mes" style="border-width: 1px;" cellspacing="2" cellpadding="6" border="1" align="center">
					<tr>
						<td align="center">管理员头像：</td>
						<td align="center"><input type="text" value="<?php echo $row['photo'];?>" name="photo"/></td>
					</tr>
					<tr>
						<td align="center">管理员昵称：</td>
						<td align="center"><input type="text" value="<?php echo $row['name'];?>"name="name"/></td>
					</tr>
					<tr>
						<td align="center">管理员真实姓名：</td>
						<td align="center"><input type="text" value="<?php echo $row['truename'];?>"name="truename"/></td>
					</tr>
					<tr>
						<td align="center">管理员密码：</td>
						<td align="center"><input type="password" value="<?php echo $row['password'];?>"name="password"/></td>
					</tr>
					<tr>
						<td align="center">管理员邮箱：</td>
						<td align="center"><input type="text" value="<?php echo $row['email'];?>"name="email"/></td>
					</tr>
					<tr>
						<td align="center">管理员性别：</td>
						<td align="center">
							<input type="radio" name="sex" value="0"/>男
							<input type="radio" name="sex" value="1"/>女
							<input type="radio" name="sex" value="2"/>保密
						</td>
					</tr>
					<tr>
						<td align="center">管理员QQ：</td>
						<td align="center"><input type="text" value="<?php echo $row['QQ'];?>"name="QQ"/></td>
					</tr>
					<tr>
						<td align="center">管理员手机号：</td>
						<td align="center"><input type="text" value="<?php echo $row['phone'];?>"name="phone"/></td>
					</tr>
					<tr>
						<td align="center">管理员地址：</td>
						<td align="center"><input type="text" value="<?php echo $row['address'];?>"name="address"/></td>
					</tr>
					<tr>
						<td align="center">管理员爱好：</td>
						<td align="center"><textarea rows="3" cols="30" name="hobby"><?php echo $row['hobby'];?></textarea></td>
					</tr>
					<tr>
						<td align="center">管理员职务：</td>
						<td align="center"><textarea rows="3" cols="30"name="job"><?php echo $row['job'];?></textarea></td>
					</tr>
				</table>
					<button style="width:300px;font-size:25px;height:30px;font-family:'楷体';left:615px;position:relative;" align="center">修改信息</button>
				</form>
	</div>
</body>
</html>