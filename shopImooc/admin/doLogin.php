<?php 
require_once '../include.php';
$username = $_POST['username'];
$username=mysql_escape_string($username);
$password = md5($_POST['password']);
$verify=$_POST['verify'];
$verify1=$_POST['verify'];
$autoFlag=$_POST['autoFlag'];
if ($verify==$verify1){
    $sql = "select * from imooc_admin where username = '{$username}'and password ='{$password}'";
    $res=checkAdmin($sql);
    if($res){
        //如果选了一周内自动登录
        if($autoFlag){
            setcookie("adminId",$row['id'],time()+7*24*3600);
            setcookie("adminName",$row['username'],time()+7*24*3600);
        }
        $_SESSION['adminName'] = $res['username'];
        $_SESSION['adminId'] =$res['id'];
        alertMes("登录成功", "index.php");
    }
    else{
        alertMes("登录失败，重新登录", "login.php");
    }
}else{
    alertMes("验证码输入错误", "login.php");
}