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
	<div class="user_ord_b_b">
							<div>
								<table  class="table" style="border-width: 1px;" cellspacing="0" cellpadding="5" border="1" align="center">
									 <thead>
                            			<tr>
                                			<th width="10%" align="center">编号</th>
                                			<th width="50%" align="center">内容</th>
                                			<th width="15%" align="center">提出人</th>
                                			<th width="15%" align="center">提出时间</th>
                                			<th width="10%" align="center">操作</th>
                            			</tr>
                        			</thead>
									<tbody>
										<?php $link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
												$sql="select username,id,date, details from useradv";
												$totalRows=getSqlNum($link,$sql);
												$totalPage=ceil($totalRows/$pageSize);
												if($page<1||$page==null||!is_numeric($page)){
													$page=1;
												}
												if($page>=$totalPage)$page=$totalPage;
												$offset=($page-1)*$pageSize;
												$sql="select username,id,date, details from useradv limit {$offset},{$pageSize}";
												$result=mysqli_query($link,$sql);
											while(($row=mysqli_fetch_array($result,MYSQLI_ASSOC))==null?0:1):
										?>
										<tr>
										　	<td align="center"><?php echo $row['id'];?></td>
										　	<td align="center"><?php echo $row['details'];?></td>
										　	<td align="center"><?php echo $row['username'];?></td>
										　	<td align="center"><?php echo $row['date'];?></td>
											<td align="center">
											<button onclick="ifDes(<?php echo $row['id'];?>)">删除</button>
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
						</div>
</body>
<script>
	function ifDes(id){
		if(window.confirm("您确认要删除嘛？")){
			window.location='delMes.php?table=useradv&target=userAdv&id='+id;
		}
	}
</script>
</html>