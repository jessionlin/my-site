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
	<div>
								<table  class="table" style="border-width: 1px;" cellspacing="0" cellpadding="5" border="1" align="center">
									 <thead>
                            			<tr>
                                			<th width="15%" align="center">商品编号</th>
                                			<th width="20%" align="center">商品名称</th>
                                			<th width="20%" align="center">商品图片</th>
                                			<th width="10%" align="center">用户名</th>
                                			<th width="15%" align="center">购买数量</th>
                                			<th width="10%" align="center">购买时间</th>
                                			<th width="10%" align="center">操作</th>
                            			</tr>
                        			</thead>
									<tbody>
										<?php $link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
												$sql="select id,proid,name,boughttime,amount from pro_sold";
												$totalRows=getSqlNum($link,$sql);
												$totalPage=ceil($totalRows/$pageSize);
												if($page<1||$page==null||!is_numeric($page)){
													$page=1;
												}
												if($page>=$totalPage)$page=$totalPage;
												$offset=($page-1)*$pageSize;
												$sql="select id,proid,name,boughttime,amount from pro_sold limit {$offset},{$pageSize}";
												$result=mysqli_query($link,$sql);
											while(($row=mysqli_fetch_array($result,MYSQLI_ASSOC))==null?0:1):
										?>
										<?php $sql1="select name from pro where id='{$row['proid']}'";
											$result1=mysqli_query($link,$sql1);
											while(($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))==null?0:1):
											?>
										<tr>
										　	<td align="center"><?php echo $row['id'];?></td>
										　	<td align="center"><?php echo $row1['name'];?></td>
											<td align="center">
												<?php $sql2="select img_4 from pro_img where proid='{$row['proid']}'";
												$result2=mysqli_query($link,$sql2);
												while(($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC))==null?0:1):?>
												<img src="<?php echo $row2['img_4'];?>">
												<?php endwhile;
												mysqli_free_result($result2);?>
											</td>
										　	<td align="center"><?php echo $row['name'];?></td>
											<td align="center"><?php echo $row['amount'];?></td>
										　	<td align="center"><?php echo $row['boughttime'];?></td>
											<td align="center">
											<form action="delMes.php?id=<?php echo $row['id'];?>&table=pro_sold" method="post">
											<button>删除</button>
											</form>
											</td>
										</tr>
											<?php endwhile;
												mysqli_free_result($result1);?>
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
</html>