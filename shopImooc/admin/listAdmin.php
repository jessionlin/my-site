<?php 
// require_once '../include.php';
// $sql="select * from imooc_admin";
// $totalRows=getResultNum($sql);
$pageSize=2;
$page = $_REQUEST['page'] ? (int) $_REQUEST['page'] : 1;
// $totalPage=ceil($totalRows/$pageSize);
 //$page = $_REQUEST['page'] ?(int) $_REQUEST['page'] : 1;
// if ($page < 1 || $page == null || ! is_numeric($page)) {
//     $page = 1;
// }
// $offset = ($page - 1) * $pageSize;
// if ($page >= $totalPage)
//         $page = $totalPage;
// $sql="select id,username,email from imooc_admin limit {$offset},{$pageSize}";
// $rows=fetchAll($sql);
$rows = getAdminByPage($page,$pageSize);
//$rows=getAllAdmin();
if(!$rows){
    alertMes("sorry,û���û�,�����", "addUser.php");
    exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="��&nbsp;&nbsp;��" class="add"  onclick="addAdmin()">
                        </div>
                            
                    </div>
                    <!--���-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="15%">���</th>
                                <th width="20%">�û�����</th>
                                <th width="20%">�û�����</th>
                                <th>����</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($rows as $row):?>
                            <tr>
                                <!--�����id��for�����c1 ��Ҫѭ������-->
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['id'];?></label></td>
                                <td><?php echo $row['username'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td align="center"><input type="button" value="�޸�" class="btn" onclick="editAdmin(<?php echo $row['id'];?>)"><input type="button" value="ɾ��" class="btn"  onclick="delAdmin(<?php echo $row['id'];?>)"></td>
                            </tr>
                            <?php  endforeach;?>
                            <?php if($totalRows>$pageSize):?>
                            <tr>
                            	<td colspan="4"><?php echo showPage($page, $totalPage);?></td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
</body>
<script type="text/javascript">
	function addAdmin(){
		window.location="addUser.php";
	}
	function editAdmin(id){
		window.location="editUser.php?id="+id;
	}
	function delAdmin(id){
		if(window.confirm("��ȷ��Ҫɾ����?")){
			window.location="doAdminAction.php?act=delAdmin&id="+id;
		}
</script>
</html>