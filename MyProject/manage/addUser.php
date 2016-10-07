<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
</style>
	<title></title>
</head>
<body>
	<div class="user_mes"><form action="action.php?act=addUser" method="post">
				<table class="mes" style="border-width: 1px;" cellspacing="2" cellpadding="7" border="1" align="center" height="600px;">
					<tr>
						<td align="center">用户头像：</td>
						<td align="center"><input type="text" value="" name="photo"/></td>
					</tr>
					<tr>
						<td align="center">用户昵称：</td>
						<td align="center"><input type="text" value="" name="name"/></td>
					</tr>
					<tr>
						<td align="center">用户真实姓名：</td>
						<td align="center"><input type="text" value="" name="truename"/></td>
					</tr>
					<tr>
						<td align="center">用户密码：</td>
						<td align="center"><input type="password" value="" name="password"/></td>
					</tr>
					<tr>
						<td align="center">用户邮箱：</td>
						<td align="center"><input type="text" value="" name="email"/></td>
					</tr>
					<tr>
						<td align="center">用户QQ：</td>
						<td align="center"><input type="text" value="" name="QQ"/></td>
					</tr>
					<tr>
						<td align="center">用户手机号：</td>
						<td align="center"><input type="text" value="" name="phone"/></td>
					</tr>
					<tr>
						<td align="center">用户性别：</td>
						<td align="center">
							<input type="radio" name="sex" value="0"/>男
							<input type="radio" name="sex" value="1"/>女
							<input type="radio" name="sex" value="2"/>保密
						</td>
					</tr>
					<tr>
						<td align="center">用户地址：</td>
						<td align="center"><input type="text" value="" name="address"/></td>
					</tr>
					<tr>
						<td align="center">用户爱好：</td>
						<td align="center"><textarea rows="3" cols="30" name="hobby"></textarea></td>
					</tr>
					<tr>
						<td align="center">用户邮寄地址1：</td>
						<td align="center"><textarea rows="3" cols="30" name="address_1"></textarea></td>
					</tr>
					<tr>
						<td align="center">用户邮寄地址2：</td>
						<td align="center"><textarea rows="3" cols="30" name="address_2"></textarea></td>
					</tr>
					<tr>
						<td align="center">用户邮寄地址3：</td>
						<td align="center"><textarea rows="3" cols="30" name="address_3"></textarea></td>
					</tr>
					<tr>
						<td align="center">用户邮寄地址4：</td>
						<td align="center"><textarea rows="3" cols="30" name="address_4"></textarea></td>
					</tr>
				</table>
					<button style="width:300px;font-size:25px;height:30px;font-family:'楷体';left:615px;position:relative;" align="center">添加信息</button>
				</form>
	</div>
</body>
</html>