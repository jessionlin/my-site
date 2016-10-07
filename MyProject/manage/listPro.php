<?php require_once 'page.php';
require_once '../conf/configs.php';
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$pageSize=5;?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
</head>
<body>
	<form action="proMes.php" method="post">
	<div class="search">
		<input type="text" placeholder="请输入商品名" name="name"/>
		<button>查询</button>
	</div>
	</form>
	<div class="user_ord_b_b">
								<table  class="table" style="border-width: 1px;" cellspacing="0" cellpadding="5" border="1" align="center">
									 <thead>
                            			<th width="10%" align="center">商品编号</th>
											<th width="10%" align="center">商品名称</th>
                                			<th width="20%" align="center">商品详情</th>
                                			<th width="10%" align="center">商品图片</th>
                                			<th width="10%" align="center">已卖数量</th>
                                			<th width="10%" align="center">剩余数量</th>
                                			<th width="10%" align="center">出货厂家</th>
											<th width="10%" align="center">分类</th>
                                			<th width="10%" align="center">操作</th>
                        			</thead>
									<tbody>
										<?php $link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
												$sql="select id,name,details,wholenumber,soldnumber,factory,sort from pro ";
												$totalRows=getSqlNum($link,$sql);
												$totalPage=ceil($totalRows/$pageSize);
												if($page<1||$page==null||!is_numeric($page)){
													$page=1;
												}
												if($page>=$totalPage)$page=$totalPage;
												$offset=($page-1)*$pageSize;
												$sql="select id,name,details,wholenumber,soldnumber,factory,sort from pro  limit {$offset},{$pageSize}";
												$result=mysqli_query($link,$sql);
											while(($row=mysqli_fetch_array($result,MYSQLI_ASSOC))==null?0:1):
										?>
										<tr>
										　	<td align="center"><?php echo $row['id'];?></td>
										　	<td align="center"><?php echo $row['name'];?></td>
											<td align="center"><?php echo $row['details'];?></td>
											<td align="center">
												<?php $sql1="select img_4 from pro_img where proid='{$row['id']}'";
												$result1=mysqli_query($link,$sql1);
											while(($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))==null?0:1):?>
												<img src="<?php echo $row1['img_4'];?>">
												<?php endwhile;mysqli_free_result($result1);?>
											</td>
											<td align="center"><?php echo $row['soldnumber'];?></td>
										　	<td align="center"><?php echo (int)$row['wholenumber']-(int)$row['soldnumber'];?></td>
											<td align="center"><?php echo $row['factory'];?></td>
											<td align="center"><?php echo $row['sort'];?></td>
											<td align="center">
											<button onclick="ifDes(<?php echo $row['id'];?>)">删除</button>
											</td>
										</tr>
										<?php endwhile;
											mysqli_free_result($result);
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
			window.location='delMes.php?table=pro&target=listPro&id='+id;
		}
	}
</script>
</html>