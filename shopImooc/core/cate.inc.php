<?php
/*
 * 添加分类
 */
global $table;
$table="imooc_cate";
function addCate() {
    $arr=$_POST;
    if(insert($table, $arr)){
        $mes="分类添加成功!<br/><a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看分类</a>";
    }
    else{
        $mes="分类添加失败，重新添加!<a href='addCate.php'>重新添加</a>|<a href='listCate.php'>查看分类</a>";
    }
    return $mes;
}
/*
 * 根据ID得到分类信息
 */
function getCateById($id){
    $sql="select id,cName from imooc_cate where id={$id}";
    return fetchOne($sql);
}

/*
 * 修改分类
 */
function editCate($where){
    $arr=$_POST;
    if(update("imooc_cate", $arr)){
        $mes="分类修改成功!<br/><a href='listCate.php'>查看分类</a>";
    }else{
        $mes="分类修改失败!<br/><a href='listCate.php'>重新修改</a>";
    }
    return $mes;
}

/*
 * 删除分类
 */
function delCate($where){
   if(delete("imooc_cate",$where)){
       $mes="分类删除成功!<br/><a href='listCate.php'>查看分类</a>|<a href='addCate.php'>添加分类</a>";
   }
   else{
       $mes="分类删除失败!<br/><a href='listCate.php'>请重新操作</a>";
   }
    return $mes;
}
/*
 * 得到所有分类
 */
function getAllCate(){
    $sql="select id,cName from imooc_cate";
    $rows=fetchAll($sql);
    return $rows;
}