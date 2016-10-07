<?php 
require_once '../include.php';
checkLogined();
$rows=getAllCate();
if(!$rows){
// 	alertMes("没有相应分类，请先添加", "addCate.php");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link href="./styles/global.css"  rel="stylesheet"  type="text/css" media="all" />
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript" src="./scripts/jquery-1.6.4.js"></script>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
        $(document).ready(function(){
        	$("#selectFileBtn").click(function(){
        		$fileField = $('<input type="file" name="thumbs[]"/>');
        		$fileField.hide();
        		$("#attachList").append($fileField);
        		$fileField.trigger("click");
        		$fileField.change(function(){
        		$path = $(this).val();
        		$filename = $path.substring($path.lastIndexOf("\\")+1);
        		$attachItem = $('<div class="attachItem"><div class="left">a.gif</div><div class="right"><a href="#" title="鍒犻櫎闄勪欢">鍒犻櫎</a></div></div>');
        		$attachItem.find(".left").html($filename);
        		$("#attachList").append($attachItem);		
        		});
        	});
        	$("#attachList>.attachItem").find('a').live('click',function(obj,i){
        		$(this).parents('.attachItem').prev('input').remove();
        		$(this).parents('.attachItem').remove();
        	});
        });
</script>
</head>
<body>
<h3>娣诲姞鍟嗗搧</h3>
<form action="doAdminAction.php?act=addPro" method="post" enctype="multipart/form-data">
<table width="70%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">鍟嗗搧鍚嶇О</td>
		<td><input type="text" name="pName"  placeholder="输入商品名称"/></td>
	</tr>
	<tr>
		<td align="right">商品分类</td>
		<td>
		<select name="cId">
			<?php foreach($rows as $row):?>
				<option value="<?php echo $row['id'];?>"><?php echo $row['cName'];?></option>
			<?php endforeach;?>
		</select>
		</td>
	</tr>
	<tr>
		<td align="right">鍟嗗搧璐у彿</td>
		<td><input type="text" name="pSn"  placeholder="璇疯緭鍏ュ晢鍝佽揣鍙�"/></td>
	</tr>
	<tr>
		<td align="right">鍟嗗搧鏁伴噺</td>
		<td><input type="text" name="pNum"  placeholder="璇疯緭鍏ュ晢鍝佹暟閲�"/></td>
	</tr>
	<tr>
		<td align="right">鍟嗗搧甯傚満浠�</td>
		<td><input type="text" name="mPrice"  placeholder="璇疯緭鍏ュ晢鍝佸競鍦轰环"/></td>
	</tr>
	<tr>
		<td align="right">鍟嗗搧鎱曡浠�</td>
		<td><input type="text" name="iPrice"  placeholder="璇疯緭鍏ュ晢鍝佹厱璇句环"/></td>
	</tr>
	<tr>
		<td align="right">鍟嗗搧鎻忚堪</td>
		<td>
			<textarea name="pDesc" id="editor_id" style="width:100%;height:150px;"></textarea>
		</td>
	</tr>
	<tr>
		<td align="right">鍟嗗搧鍥惧儚</td>
		<td>
			<a href="javascript:void(0)" id="selectFileBtn">娣诲姞闄勪欢</a>
			<div id="attachList" class="clear"></div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="鍙戝竷鍟嗗搧"/></td>
	</tr>
</table>
</form>
</body>
</html>