<?php
require_once '../include.php';
$act = $_REQUEST['act'];
$id=$_REQUEST['id'];
if($act=="logout"){
    logout();
}elseif($act=="addAdmin"){
    $mes=addAdmin();
}elseif($act=="editAdmin"){
    $mes=editAdmin($id);
}elseif($act=="delAdmin"){
    $mes=delAdmin($id);
}elseif($act=="addCate"){
    $mes=addCate();
}elseif($act=="editCAte"){
    $where="id={$id}";
    $mes=editCate($where);
}elseif($act=="delCate"){
    $where="id={$id}";
    $mes=delCate($where);
}elseif($act=="addPro"){
    $mes=addPro();
}elseif($act="editPro"){
    $mes=editPro($id);
}elseif($act="delPro"){
    $mes=delPro($id);
}elseif($act="addUser"){
    $mes=addUser();
}elseif ($act=="delUser"){
    $mes=delUser($id);
}elseif($act=="editUser"){
    $mes=editUser($id);
}elseif($act=="waterText"){
    $mes=doWaterText($id);
}elseif ($act=="waterPic"){
    $mes=doWaterPic($id);
}

?>
<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<?php 
if($mes){
    echo  $mes;
}
?>
</body>
</html>