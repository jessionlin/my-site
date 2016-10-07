<?php
require_once 'upload.func.php';
header("content-type:text/html;charset=utf-8");
require_once '../lib/string.func.php';
/*
 * �����ϴ��ļ���Ϣ
 */
function buildInfo(){
    $i=0;
    foreach($_FILES as $v){
        //���ļ��ϴ�
        if(is_string($v['name'])){
            $files[$i]=$v;
            $i++;
        }else{
            //���ļ��ϴ�
            foreach ($v['name'] as $key=>$val){
                $files[$i]['name'] = $val;
                $files[$i]['size'] = $v['size'][$key];
                $files[$i]['tmp_name'] = $v['tmp_name'][$key];
                $files[$i]['error'] = $v['error'][$key];
                $files[$i]['type'] = $v['type'][$key];
                $i++;
            }
        }
    }
    return $files;
}

function uploadFile($path="upload",$allowExt=array("gif","jpeg","png","jpg","wbmp"),$maxSize=2097152,$imgFlag=true){
    if(!file_exists($path)){
        mkdir($path,0777,true);
    }
    $files=buildInfo();
    $i=0;
    foreach ($files as $file){
        if($file['error']===UPLOAD_ERR_OK)   {
            $ext=getExt($file['name']);
            //�����ļ�����չ��
            if(!in_array($ext, $allowExt)){
                exit("�Ƿ��ļ�����");
            }
            //У���Ƿ������ͼƬ����
            if($imgFlag){
                if(getimagesize($file['tmp_name'])){
                    exit("����������ͼƬ����");
                }
            }
            //�����ϴ��ļ���С
            if($file['size']>$maxSize){
                exit("�ϴ��ļ�����");
            }
            if(!is_uploaded_file($file['tmp_name'])){
                exit("����ͨ��HTTP POST��ʽ�ϴ�!");
            }
            $filename=getUniName().".".$ext;
            $destination=$path."/".$filename;
            if(move_uploaded_file($file['tmp_name'], $destination)){
                $file['name']=$filename;
                unset($file['error'],$file['tmp_name']);
                $uploadedFiles[$i]=$file;
                $i++;
            }
        }else{
            switch ($file['error']){
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
            echo $mes;
        }
    }
    return $uploadedFiles;
}