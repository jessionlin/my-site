<?php 
require_once '../include.php';
$id=$_REQUEST['id'];
$row=getCateById($id);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>
<body>
<h3>�޸ķ���</h3>
	<form action="doAdminAction?act=editCate&id=<?php echo $id;?>" method="post">
		<table width="70%" border="1" cellpadding="5" cellspacing="0"
			bgcolor="#cccccc">
			<tr>
				<td align="right">��������</td>
				<td><input type="text" name="cName" placeholder="<?php echo $row['cName'];?>"/></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="�޸ķ���"></td>
			</tr>
		</table>
	</form>
</body>
</html>