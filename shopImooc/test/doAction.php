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
//�ж��´�����Ϣ
if($error==UPLOAD_ERR_OK){
    $ext=getExt($filename);
    //�����ϴ��ļ�����
    if(!in_array($ext, $allowExt)){
        exit("�Ƿ��ļ�����");
    }
    //�����ļ��ϴ���С
    if($size>$maxSize){
        exit("�ϴ��ļ�����");
    }
    if($imgFlag){
        //�����֤ͼƬ�Ƿ���һ��������ͼƬ����
        $info=getimagesize($tmp_name);
       if(!$info){
           exit("��֪������ͼƬ����");
       }
    }
    //��Ҫ�ж����ļ��Ƿ���ͨ��HTTP POST��ʽ�ϴ�����
    $filename=getUniName().".".$ext;
    $path="uploads";
    if(!file_exists($path)){
        mkdir($path,0777,true);
    }
    $destination=$path."/".$filename;
    if(is_uploaded_file($tmp_name)){
        if(move_uploaded_file($tmp_name, $destination)){
            $mes="�ļ��ϴ��ɹ�";
        }
        else{
            $mes="�ļ��ƶ�ʧ��";
        }
    }else{
        $mes="�ļ�����ͨ��HTTP POST��ʽ�ϴ�����";
    }
}else{
    switch ($error){
        case 1:
            $mes="�����������ļ��ϴ��Ĵ�С";
            break;
        case 2:
            $mes="�����˱������ϴ��ļ��Ĵ�С";
            break;
        case 3:
            $mes="�ļ����ֱ��ϴ�";
            break;
        case 4:
            $mes="û���ļ����ϴ�";
            break;
        case 6:
            $mes="û���ҵ���ʱĿ¼";
            break;
        case 7:
            $mes="����д";
            break;
        case 8:
            $mes="����PHP����չ�����ж��ϴ�";
            break;
    }
}