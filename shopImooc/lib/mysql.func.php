<?php
/*
 * �������ݿ�
 */
function connect(){
	$link=mysql_connect(DB_HOST,DB_USER,DB_PWD) or die("���ݿ����Ӵ���:Error:".mysql_errno().":".mysql_error());
    mysql_set_charset(DB_CHARSET);
    mysql_select_db(DB_DBNAME) or die("ָ�����ݿ��ʧ��!");
    return $link;
}

/*
 * ��ɼ�¼�Ĳ���
 */
function  insert($table,$array){
    $keys = join(",",array_keys($array));
    $vals = "'".join("','",array_values($array))."'";
    $sql = "insert {$table}{$keys} values({$vals})";
    mysql_query($sql);
    return mysql_insert_id();
}

/*
 * ��ɼ�¼�ĸ���
 */
function update($table,$array,$where = null) {
    foreach($array as $key=>$val){
        if($str==null){
            $sep="";
        }else{
            $sep=",";
        }
        $str.=$sep.$key."='".$val."'";
       } 
        $sql="update {$table} set {$str}" .($where ==null?null:"where".$where);
        mysql_query($sql);
        if($result){
                   return  mysql_affected_rows();  
        }
        else{
            return false;
        }
}

/*
 * ��ɼ�¼��ɾ��
 */
function delete($table,$where=null) {
    $where=$where==null?null:"where".$where;
    $sql = "delete from {$table}{$where}";
    mysql_query($sql);
    return mysql_affected_rows();
}


/*
 * �õ�ָ��һ����¼
 */
function fetchOne($sql,$result_type=MYSQL_ASSOC){
    $result = mysql_query($sql);
    $row=mysql_fetch_array($result,$result_type);
    return $row;
}

/*
 * �õ�ָ�����м�¼
 */
function fetchAll($sql,$result_type=MYSQL_ASSOC){
    $result = mysql_query($sql);
   while(@$row=mysql_fetch_array($result,$result_type)){
       $rows[]=$row;
   }
    return $rows;
}

/*
 * �õ���¼��Ŀ
 */
function getResultNum($sql){
    $result=mysql_query($sql);
    return mysql_num_rows($result);
}

/*
 * �õ���һ�������¼��ID
 */
function getInsertId() {
    return mysql_insert_id();
}