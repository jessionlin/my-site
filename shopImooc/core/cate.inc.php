<?php
/*
 * ��ӷ���
 */
global $table;
$table="imooc_cate";
function addCate() {
    $arr=$_POST;
    if(insert($table, $arr)){
        $mes="������ӳɹ�!<br/><a href='addCate.php'>�������</a>|<a href='listCate.php'>�鿴����</a>";
    }
    else{
        $mes="�������ʧ�ܣ��������!<a href='addCate.php'>�������</a>|<a href='listCate.php'>�鿴����</a>";
    }
    return $mes;
}
/*
 * ����ID�õ�������Ϣ
 */
function getCateById($id){
    $sql="select id,cName from imooc_cate where id={$id}";
    return fetchOne($sql);
}

/*
 * �޸ķ���
 */
function editCate($where){
    $arr=$_POST;
    if(update("imooc_cate", $arr)){
        $mes="�����޸ĳɹ�!<br/><a href='listCate.php'>�鿴����</a>";
    }else{
        $mes="�����޸�ʧ��!<br/><a href='listCate.php'>�����޸�</a>";
    }
    return $mes;
}

/*
 * ɾ������
 */
function delCate($where){
   if(delete("imooc_cate",$where)){
       $mes="����ɾ���ɹ�!<br/><a href='listCate.php'>�鿴����</a>|<a href='addCate.php'>��ӷ���</a>";
   }
   else{
       $mes="����ɾ��ʧ��!<br/><a href='listCate.php'>�����²���</a>";
   }
    return $mes;
}
/*
 * �õ����з���
 */
function getAllCate(){
    $sql="select id,cName from imooc_cate";
    $rows=fetchAll($sql);
    return $rows;
}