
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<h3>����û�</h3>
	<form action="doAdminAction?act=addUser" method="post" enctype="multipart/form-data">
		<table width="70%" border="1" cellpadding="5" cellspacing="0"
			bgcolor="#cccccc">
			<tr>
				<td align="right">�û�����</td>
				<td><input type="text" name="username" placeholder="�������û�����"/></td>
			</tr>
			<tr>
				<td align="right">����</td>
				<td><input type="password" name="password"/></td>
			</tr>
			<tr>
				<td align="right">����</td>
				<td><input type="text" name="email" placeholder="�������û�����"/></td>
			</tr>
			<tr>
				<td align="right">�Ա�</td>
				<td>
				<input type="radio" name="sex" value="1" check="checked"/>��
				<input type="radio" name="sex" value="2"/>Ů
				<input type="radio" name="sex" value="3"/>����
				</td>
			</tr>
			<tr>
				<td align="right">ͷ��</td>
				<td><input type="file" name="myFile"/>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="��ӹ���Ա"></td>
			</tr>
		</table>
	</form>
</body>
</html>
