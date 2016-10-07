<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>添加管理员</title>
</head>
<body>
	<div><form action="action.php?act=addAdm" method="post">
		<table class="mes" style="border-width: 1px;" cellspacing="2" cellpadding="6" border="1" align="center">
					<tr>
						<td align="center">管理员头像：</td>
						<td align="center"><input type="text" value="" name="photo"/></td>
					</tr>
					<tr>
						<td align="center">管理员昵称：</td>
						<td align="center"><input type="text" value=""name="name"/></td>
					</tr>
					<tr>
						<td align="center">管理员真实姓名：</td>
						<td align="center"><input type="text" value=""name="truename"/></td>
					</tr>
					<tr>
						<td align="center">管理员密码：</td>
						<td align="center"><input type="password" value=""name="password"/></td>
					</tr>
					<tr>
						<td align="center">管理员邮箱：</td>
						<td align="center"><input type="text" value=""name="email"/></td>
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
						<td align="center"><input type="text" value=""name="QQ"/></td>
					</tr>
					<tr>
						<td align="center">管理员手机号：</td>
						<td align="center"><input type="text" value=""name="phone"/></td>
					</tr>
					<tr>
						<td align="center">管理员地址：</td>
						<td align="center"><input type="text" value=""name="address"/></td>
					</tr>
					<tr>
						<td align="center">管理员爱好：</td>
						<td align="center"><textarea rows="3" cols="30" name="hobby"></textarea></td>
					</tr>
					<tr>
						<td align="center">管理员职务：</td>
						<td align="center"><textarea rows="3" cols="30"name="job"></textarea></td>
					</tr>
				</table>
					<button style="width:300px;font-size:25px;height:30px;font-family:'楷体';left:615px;position:relative;" align="center">添加信息</button>
				</form>
	</div>
</body>
</html>