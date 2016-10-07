<?php require_once '../conf/configs.php';
require_once 'check.php';
checkLogin();
$where = null;
$content=null;
$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
if($_POST['content']&&$_POST['content']!="01"){
    $content = "%".$_POST['content']."%";
}
else if($_POST['content']==01){
    $content = "%%";
    $where = $_REQUEST['where'];
}
if($where != null&&$content!=null){
    $sql = "select * from pro where name like '{$content}'{$where}";
}
else{$sql = "select * from pro where name like '{$content}'";}

if($where != null){
    $sql = "select * from pro where name like '{$content}'{$where}";
}
else{$sql = "select * from pro where name like '{$content}'";}
if($_REQUEST['wheres']){
    $wheres = $_REQUEST['wheres'];
    $sql = "select * from pro  where sort='{$wheres}'";
}
else if($_REQUEST['wheress']){
    $wheress = $_REQUEST['wheress'];
    $sql = "select * from pro  where factory='{$wheress}'";
}
$result = mysqli_query($link, $sql);
$i = 0;
$rows = array();
$rows1 = array();
$str = array();
while($rows[$i] = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $sql1="select img_3 from pro_img where proid = '{$rows[$i]['id']}'";
    $result1 = mysqli_query($link, $sql1);
    $j = 0;
    while(($str[$j] = mysqli_fetch_array($result1,MYSQLI_ASSOC))&&$j<1){
        $rows1[$i][1] = $str[$j]['img_3'];
        $rows1[$i][0] = $rows[$i]['id'];
        $rows1[$i][2] = $rows[$i]['details'];
        $j++;
    }
    $i++;
    mysqli_free_result($result1);
}
mysqli_free_result($result);
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
.show{
	width:100%;
	height:600px;
}
.show .search{
	width:100%;
	height:600px;
	position:relative;
	float:left;
	margin:3px auto;
	margin-top:0;
	margin-left:200px;
}
.show .search ul{
	list-style: none;
}
.show .search ul li{
	width:200px;
	height:260px;
	float:left;
	position:relative;
    left:-200px;
	margin-top:20px;
}
.show .search ul li a{
	text-decoration: none;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="scripts/jquery-1.6.4.js"></script>
<script type="text/javascript" src="scripts/change.js"></script>
	<title>搜索查询</title>
</head>
<body>
<div style="width:100%;height:60px;background-color: #5B00AE;position:relative;top:-50px;align:center;color:#FFFFFF;font-size:50px;font-family:'隶书';text-align:center;">
<h3>15手工制品商城</h3>
</div>
<div>欢迎您:<?php echo $_SESSION['username'];?></div>
<div class = "show">
<div class = "search"><ul>
<?php foreach($rows1 as $row1):?>
<li><a href="buying.php?id=<?php echo $row1[0];?>"><img src="<?php echo "../manage/".$row1[1];?>"><div style="width: 200px;height: 60px;background-color: #CAFFFF;"><span><?php echo $row1[2];?></span></div></a></li>
<li style="width:70px;"></li>
<?php endforeach;?>
</ul></div>
</div>
</body>
</html>