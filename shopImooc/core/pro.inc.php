<?php

/*
 * �����Ʒ
 */
function addPro(){
     $arr=$_POST;
    $arr['pubTime']=time();
    $path="./uploads";
    $uploadFiles=uploadFile($path);
    if(is_array($uploadFiles)&&$uploadFiles){
        foreach ($uploadFiles as $key=>$uploadFiles){
            thumb($path."/".$uploadFiles['name'],"../image_50/".$uploadFiles['name'],50,50);
            thumb($path."/".$uploadFiles['name'],"../image_220/".$uploadFiles['name'],220,220);
            thumb($path."/".$uploadFiles['name'],"../image_350/".$uploadFiles['name'],350,350);
            thumb($path."/".$uploadFiles['name'],"../image_800/".$uploadFiles['name'],800,800);
        }
    }
    $res=insert("imooc_pro", $arr);
    $pid=getInsertId();
    if($res&&$pid){
        foreach($uploadFiles as $uploadFiles['name']){
             $arr1['pid']=$pid;
        $arr1['albumPath'] = $uploadFiles['name'];
        addAlbum($arr1);
        }
       $mes="<p>��ӳɹ�!</p><a href='addPro.php' target='mainFrame'>�������</a>|<a href='listPro.php' target='mainFrame'>�鿴��Ʒ�б�</a>";
    }
    else{
        foreach ($uploadFiles as $uploadFile){
            if(file_exists("../image_800/".$uploadFile['name'])){
               unlink("../image_800/".$uploadFile['name']);
            }
            elseif(file_exists("../image_50/".$uploadFile['name'])){
                unlink("../image_50/".$uploadFile['name']);
            }
            elseif(file_exists("../image_220/".$uploadFile['name'])){
                unlink("../image_220/".$uploadFile['name']);
            }
            elseif(file_exists("../image_350/".$uploadFile['name'])){
                unlink("../image_350/".$uploadFile['name']);
            }
        } 
        $mes="<p>���ʧ��!</p><a href='addPro.php' target='mainFrame'>�������</a>";
    }
    return $mes;
}

function editPro($id)
{
    $arr = $_POST;
    $path = "./uploads";
    $uploadFiles = uploadFile($path);
    if (is_array($uploadFiles) && $uploadFiles) {
        foreach ($uploadFiles as $key => $uploadFiles) {
            thumb($path . "/" . $uploadFiles['name'], "../image_50/" . $uploadFiles['name'], 50, 50);
            thumb($path . "/" . $uploadFiles['name'], "../image_220/" . $uploadFiles['name'], 220, 220);
            thumb($path . "/" . $uploadFiles['name'], "../image_350/" . $uploadFiles['name'], 350, 350);
            thumb($path . "/" . $uploadFiles['name'], "../image_800/" . $uploadFiles['name'], 800, 800);
        }
    }
    $where = "id={$id}";
    $res = update("imooc_pro", $arr, $where);
    $pid = $id;
    if ($res && $pid && is_array($uploadFiles)&&$uploadFiles) {
        
        foreach ($uploadFiles as $uploadFiles['name']) {
            $arr1['pid'] = $pid;
            $arr1['albumPath'] = $uploadFiles['name'];
            addAlbum($arr1);
        }
        $mes = "<p>�༭�ɹ�!</p>|<a href='listPro.php' target='mainFrame'>�鿴��Ʒ�б�</a>";
    } else {
        if (is_array($uploadFiles) && $uploadFiles) {
            foreach ($uploadFiles as $uploadFile) {
                if (file_exists("../image_800/" . $uploadFile['name'])) {
                    unlink("../image_800/" . $uploadFile['name']);
                } elseif (file_exists("../image_50/" . $uploadFile['name'])) {
                    unlink("../image_50/" . $uploadFile['name']);
                } elseif (file_exists("../image_220/" . $uploadFile['name'])) {
                    unlink("../image_220/" . $uploadFile['name']);
                } elseif (file_exists("../image_350/" . $uploadFile['name'])) {
                    unlink("../image_350/" . $uploadFile['name']);
                }
            }
        }
        $mes = "<p>�༭ʧ��!</p><a href='listPro.php' target='mainFrame'>���±༭</a>";
        return $mes;
    }
}
/*
 * �õ���Ʒ��ȫ����Ϣ
 */
function getAllProByAdmin(){
    $sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from imooc_pro as p join imooc_cate c on p.cId=c.id";
    $rows=fetchAll($sql);
    return $rows;
}



function getAllImgByProId($id){
    $sql="select a.albumPath from imooc_album a where pid={$id}";
    $rows=fetchAll($sql);
    return $rows;
}


function getProById($id) {
    $sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.cId={$id}";
    $rows=fetchOne($sql);
    return $rows;
}

function delPro($id){
    $where="id={$id}";
    $res=delete("imooc_pro",$where);
    $proImgs=getAllImgByProId($id);
    if($proImgs&&is_array($proImgs)){
        foreach ($proImgs as $proImg){
            if(file_exists("uploads/".$proImg['albumPath'])){
                unlink("uploads/".$proImg['albumPath']);
            }
            if(file_exists("../image_50/".$proImg['albumPath'])){
                unlink("../image_50/".$proImg['albumPath']);
            }
            if(file_exists("../image_220/".$proImg['albumPath'])){
                unlink("../image_220/".$proImg['albumPath']);
            }
            if(file_exists("../image_350/".$proImg['albumPath'])){
                unlink("../image_350/".$proImg['albumPath']);
            }
            if(file_exists("../image_800/".$proImg['albumPath'])){
                unlink("../image_800/".$proImg['albumPath']);
            }
        }
    }
    $where1="pid={$id}";
    $res1=delete("imooc_album",$where1);
    if($res&&$res1){
        $mes="ɾ���ɹ�!<br/><a href='listPro.php' target='mainFrame'>�鿴��Ʒ�б�</a>";
    }else{
        $mes="ɾ��ʧ��!<br/><a href='listPro.php' target='mainFrame'>����ɾ��</a>";
    }
    return $mes;
}

/*
 * �õ�������Ʒ
 */
function getAllPros(){
    $sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id";
    $rows=fetchAll($sql);
    return $rows;
}

/*
*����cid�õ���Ʒ
*/
function getProsByCid($cid){
	$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.cId={$cid} limit 4";
	$rows=fetchAll($sql);
	return $rows;
}

/*
*�õ���4����Ʒ
*/
function getSmallProsByCid($cid){
	$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.cId={$cid} limit 4,4";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *�õ���ƷID����Ʒ����
 * @return array
 */
function getProInfo(){
    $sql="select id,pName from imooc_pro order by id asc";
    $rows = fetchAll($sql);
    return $rows;
}