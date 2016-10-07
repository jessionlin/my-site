<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
</head>
<body>
	<div><form action="action.php?act=addPro" method="post">
		<table class="mes" style="border-width: 1px;" cellspacing="2" cellpadding="6" border="1" align="center">
				<tr>
					<td align="center">商品名称：</td>
					<td align="center"><input type="text" value=""name="name"/></td>
				</tr>
				<tr>
					<td align="center">商品厂家：</td>
					<td align="center"><input type="text" value=""name="factory"/></td>
				</tr>
				<tr>
					<td align="center">商品分类：</td>
					<td align="center"><input type="text" value=""name="sort"/></td>
				</tr>
				<tr>
					<td align="center">商品价格：</td>
					<td align="center"><input type="text" value=""name="price"/></td>
				</tr>
				<tr>
					<td align="center">商品数目：</td>
					<td align="center"><input type="text" value=""name="number"/></td>
				</tr>
				<tr>
					<td align="center">商品详情：</td>
					<td align="center"><textarea name="details" cols="30" rows="3"></textarea></td>
				</tr>
				<tr>
					<td align="center">商品图片路径：</td>
					<td align="center"><input type="file" value=""name="path"/></td>
				</tr>
				</table>
					<button style="width:300px;font-size:25px;height:30px;font-family:'楷体';left:615px;position:relative;" align="center">添加商品</button>
				</form>
	</div>
</body>
</html>