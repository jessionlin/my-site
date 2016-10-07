<?php
require_once 'common.php';
require_once '../conf/configs.php';

	$id=(string)$_REQUEST['id'];
$table=(string)$_REQUEST['table'];
$target=(string)$_REQUEST['target'];
$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
$sql="delete from {$table} where id='{$id}'";
$result = mysqli_query($link, $sql);
if($table=="pro"){
	$sql="delete from pro_img where proid='{$id}'";
	$result = mysqli_query($link, $sql);
}
if($result){
	alertMes('删除成功',$target.'.php?page=1');
}else{
	alertMes('删除失败',$target.'.php?page=1');
}
mysqli_free_result($result);
mysqli_close($link);?>