<?php
header("content-type:text/html;charset=utf-8");
require_once '../lib/string.func.php';
//$_FILES
$filename= $_FILES['myFile']['name'];
$type= $_FILES['myFile']['type'];
$tmp_name= $_FILES['myFile']['tmp_name'];
$error= $_FILES['myFile']['error'];
$size=$_FILES['myFile']['size'];
$allowExt=array("gif","jpeg","jpg","png","wbmp");
$maxSize=1048576;
$imgFlag=true;
//判断下错误信息
if($error==UPLOAD_ERR_OK){
    $ext=getExt($filename);
    //限制上传文件类型
    if(!in_array($ext, $allowExt)){
        exit("非法文件类型");
    }
    //限制文件上传大小
    if($size>$maxSize){
        exit("上传文件过大");
    }
    if($imgFlag){
        //如何验证图片是否是一个真正的图片类型
        $info=getimagesize($tmp_name);
       if(!$info){
           exit("不知真正的图片类型");
       }
    }
    //需要判断下文件是否是通过HTTP POST方式上传来的
    $filename=getUniName().".".$ext;
    $path="uploads";
    if(!file_exists($path)){
        mkdir($path,0777,true);
    }
    $destination=$path."/".$filename;
    if(is_uploaded_file($tmp_name)){
        if(move_uploaded_file($tmp_name, $destination)){
            $mes="文件上传成功";
        }
        else{
            $mes="文件移动失败";
        }
    }else{
        $mes="文件不是通过HTTP POST方式上传来的";
    }
}else{
    switch ($error){
        case 1:
            $mes="超过了配置文件上传的大小";
            break;
        case 2:
            $mes="超过了表单设置上传文件的大小";
            break;
        case 3:
            $mes="文件部分被上传";
            break;
        case 4:
            $mes="没有文件被上传";
            break;
        case 6:
            $mes="没有找到临时目录";
            break;
        case 7:
            $mes="不可写";
            break;
        case 8:
            $mes="由于PHP的扩展程序中断上传";
            break;
    }
}