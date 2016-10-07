<?php

/*
 * 添加商品
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
       $mes="<p>添加成功!</p><a href='addPro.php' target='mainFrame'>继续添加</a>|<a href='listPro.php' target='mainFrame'>查看商品列表</a>";
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
        $mes="<p>添加失败!</p><a href='addPro.php' target='mainFrame'>重新添加</a>";
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
        $mes = "<p>编辑成功!</p>|<a href='listPro.php' target='mainFrame'>查看商品列表</a>";
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
        $mes = "<p>编辑失败!</p><a href='listPro.php' target='mainFrame'>重新编辑</a>";
        return $mes;
    }
}
/*
 * 得到商品的全部信息
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
        $mes="删除成功!<br/><a href='listPro.php' target='mainFrame'>查看商品列表</a>";
    }else{
        $mes="删除失败!<br/><a href='listPro.php' target='mainFrame'>重新删除</a>";
    }
    return $mes;
}

/*
 * 得到所有商品
 */
function getAllPros(){
    $sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id";
    $rows=fetchAll($sql);
    return $rows;
}

/*
*根据cid得到产品
*/
function getProsByCid($cid){
	$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.cId={$cid} limit 4";
	$rows=fetchAll($sql);
	return $rows;
}

/*
*得到下4条产品
*/
function getSmallProsByCid($cid){
	$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.cId={$cid} limit 4,4";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 *得到商品ID和商品名称
 * @return array
 */
function getProInfo(){
    $sql="select id,pName from imooc_pro order by id asc";
    $rows = fetchAll($sql);
    return $rows;
}