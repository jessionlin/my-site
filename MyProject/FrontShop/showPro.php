<?php require_once '../conf/configs.php';
error_reporting(0);
$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
if($_REQUEST['sort']){
    $where = $_REQUEST['sort'];
    $sql = "select id,details from pro where sort ='{$where}'";
}
else{
    $where = $_REQUEST['factory'];
    $sql = "select id from pro where factory ='{$where}'";
}
$result = mysqli_query($link, $sql);
$rows = array();
$i = 0;
while(($row=mysqli_fetch_array($result,MYSQLI_ASSOC))==null?0:1){
    $rows[$i][0] = $row['id'];
    $sql1 = "select img_4 from pro_img where proid ='{$row['id']}'" ;
    $result1 = mysqli_query($link, $sql1);
    while(($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))==null?0:1){
        $rows[$i][1] = $row1['img_4'];
    }
    $i++;
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body{width: 400px;height:350px;background-color: white;}
ul{list-style: none;width: 100%;height: 100%;}
ul .main{width: 100px;height: 100px;margin-top: 10px;margin-left: 0px;position: relative;float: left;cursor: pointer;}
ul .other{width: 30px;height: 100px;margin-top: 10px;margin-left: 0px;position: relative;float:left;}
</style>
	<title></title>
</head>
<body>
<ul>
<?php foreach($rows as $row):?>
<li class="other"></li><li class="main" onclick="toBuying(<?php echo $row[0];?>)"><img  src="<?php echo "../manage/".$row[1];?>"></li>
<?php endforeach;?>
</ul>
</body>
<script type="text/javascript">
	function toBuying(id){
	var net = "buying.php?id="+id.toString();
	window.open(net);
}
</script>
</html>
