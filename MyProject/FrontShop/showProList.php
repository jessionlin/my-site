<?php require_once '../manage/page.php';
require_once '../conf/configs.php';
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
// error_reporting(0);
$pageSize=5;?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div>
<table  class="table" style="border-width: 1px;" cellspacing="0" cellpadding="5" border="1" align="center">
									 <thead>
                            			<tr>
                                			<th width="10%" align="center">编号</th>
                                			<th width="10%" align="center">用户名</th>
                                			<th width="30%" align="center">商品图片</th>
                                			<th width="10%" align="center">数量</th>
                                			<th width="10%" align="center">价格</th>
                                			<th width="20%" align="center">详情</th>
                                			<th width="10%" align="center">操作</th>
                            			</tr>
                        			</thead>
                        			<tbody>
                        				<?php $link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
												$sql="select * from orderlist";
												$totalRows=getSqlNum($link,$sql);
												$totalPage=ceil($totalRows/$pageSize);
												if($page<1||$page==null||!is_numeric($page)){
													$page=1;
												}
												if($page>=$totalPage)$page=$totalPage;
												$offset=($page-1)*$pageSize;
												$sql="select * from orderlist limit {$offset},{$pageSize}";
												$result=mysqli_query($link,$sql);
											while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)):
										?>
										<tr>
										<td align="center"><?php echo $row['id'];?></td>
										<td align="center"><?php echo $row['username'];?></td>
										<td align="center"><img src="<?php echo $row['proimg'];?>"></td>
										<td align="center"><?php echo $row['number'];?></td>
										<td align="center"><?php echo $row['price'];?></td>
										<td align="center"><?php if($row['ifpaid']==0){echo "买家未付款!";}
										else{if($row['ifDelivery']==0){echo "商家未发货!";}else{echo "商家已发货!";}}?></td>
										<td align="center">
											<button onclick="paid(<?php echo $row['id'];?>)">付款</button>
											<button onclick="ifDes(<?php echo $row['id'];?>)">删除</button>
										</td>
										</tr>
										<?php endwhile;
											 mysqli_close($link);?>
										<?php if($totalRows>$pageSize):?>
											<tr align="center">
												<td colspan="4"><?php echo showPage($page, $totalPage);?></td>
											</tr>
										<?php endif;?>
                        			</tbody>
</table>
</div>
</body>
<script>
	function ifDes(id){
		if(window.confirm("您确认要删除嘛？")){
			window.location='../manage/delMes.php?table=ordlist&target=listOrd&id='+id;
		}
	}
	function paid(id){
		window.location='payPro.php?id='+id;
	}
</script>
</html>
