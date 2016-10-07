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
                                			<th width="10%" align="center">用户名</th>
                                			<th width="10%" align="center">材质</th>
                                			<th width="15%" align="center">大小</th>
                                			<th width="15%" align="center">定制时间</th>
                                			<th width="10%" align="center">时限</th>
                                			<th width="30%" align="center">备注</th>
                                			<th width="10%" align="center">操作</th>
                            			</tr>
                        			</thead>
									
									
									<tbody>
										<?php $link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
												$sql="select id,name,material,size,ordertime,timelimited,comment from pro_ord";
												$totalRows=getSqlNum($link,$sql);
												$totalPage=ceil($totalRows/$pageSize);
												if($page<1||$page==null||!is_numeric($page)){
													$page=1;
												}
												if($page>=$totalPage)$page=$totalPage;
												$offset=($page-1)*$pageSize;
												$sql="select id,name,material,size,ordertime,timelimited,comment from pro_ord limit {$offset},{$pageSize}";
												$result=mysqli_query($link,$sql);
											while(($row=mysqli_fetch_array($result,MYSQLI_ASSOC))==null?0:1):
										?>
										<tr>
										<td align="center"><?php echo $row['name'];?></td>
										<td align="center"><?php echo $row['material'];?></td>
										<td align="center"><?php echo $row['size'];?></td>
										<td align="center"><?php echo $row['ordertime'];?><label></label></td>
										<td align="center"><?php echo $row['timelimited'];?></td>
										<td align="center"><?php echo $row['comment'];?></td>
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
			window.location='delMes.php?table=pro_ord&target=listOrd&id='+id;
		}
	}
</script>
</html>