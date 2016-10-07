<?php
function connect(){
    $link = mysqli_connect("localhost","root","","myproject");
    return $link;
}

function get($sql){
    $link = connect();
    $result = mysqli_query($link, $sql);
    $rows = array();
    while($row = mysqli_fetch_array($result,MYSQL_ASSOC)){
        $rows[] = $row;
    }
    return isset($rows)?$rows:"" ;
}

function insert($table,$arr){
    foreach($arr as $key=>$value){
       $keyArr[] = "`".$key."`";
       $valueArr[] = "'".$value."'";
    }
    $key = implode(",", $keyArr);
    $value = implode(",", $valueArr);
    $link = connect();
    $sql = "insert into ".$table."(".$key.")values(".$value.")";
    $rows = array();
    $rows = get($sql);
    return mysqli_insert_id($link);
}

$sql = "select * from pro";
$rows = array();
$rows = get($sql);
echo count($rows);
foreach ($rows as $row){
    echo $row['id'].",";
}