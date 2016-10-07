<?php
function addAlbum($arr){
    insert("imooc_album", $arr);
}

/*
*鏍规嵁鍟嗗搧ID寰楀埌鍟嗗搧鍥剧墖
*/
function getProImgById($id){
	$sql="select albumPath from imooc_album where pid={$id} limit 1";
	$row=fetchOne($sql);
	return $row;
}

/*
*鏍规嵁鍟嗗搧ID寰楀埌鎵�鏈夊晢鍝佸浘鐗�
*/
function getProImgsById($id){
	$sql="select albumPath from imooc_album where pid={$id}";
	$rows=fetchAll($sql);
	return $rows;
}

/**
 * 文字水印操作
 * @param int $id
 * @return string
 */
function doWaterText($id){
    $rows=getProImgsById($id);
    foreach($rows as $row){
        $filename="uploads/".$row['albumPath'];
        waterText($filename);
    }
    $mes="操作成功";
    return $mes;
}

/**
 * 图片水印操作
 * @param int $id
 * @return string
 */
function doWaterText($id){
    $rows=getProImgsById($id);
    foreach($rows as $row){
        $filename="uploads/".$row['albumPath'];
        waterPic($filename);
    }
    $mes="操作成功";
    return $mes;
}