<?php require_once '../conf/configs.php';
error_reporting(0);
$id=$_REQUEST['id'];
$proid = $_REQUEST['proid'];
$recipients = $_POST['recipients'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$others = $_POST['others'];
$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
$sql ="update orderlist set recipients = '{$recipients}' where proid = '{$proid}'";
$sql1 ="update orderlist set address = '{$address}' where proid = '{$proid}'";
$sql2 ="update orderlist set phone = '{$phone}' where proid = '{$proid}'";
$sql3 = "update orderlist set others = '{$others}' where proid = '{$proid}'";
$sql4 = "update orderlist set ifpaid=1 where proid = '{$proid}'";
$result = mysqli_query($link, $sql);
$result1 = mysqli_query($link, $sql1);
$result2 = mysqli_query($link, $sql2);
$result3 = mysqli_query($link, $sql3);
$result4 = mysqli_query($link, $sql4);

$row = mysqli_fetch_array($result);
$row1 = mysqli_fetch_array($result1);
$row2 = mysqli_fetch_array($result2);
$row3 = mysqli_fetch_array($result3);
$row4 = mysqli_fetch_array($result4);
mysqli_close($link);
$url = "doBuying.php?id={$proid}&number={$_REQUEST['number']}";
echo "<script>window.location='{$url}'</script>";
?>
