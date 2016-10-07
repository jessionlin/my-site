<?php 

$filename="../images/ss.jpg";
waterText($filename);
function waterText($filename,$text="亲，个人信息完善了吗",$fontfile="MSYH.TTC"){
$fileInfo=getimagesize($filename);
$mime=$fileInfo['mime'];
$createFun=str_replace("/", "createfrom", $mime);
$outFun=str_replace("/", null, $mime);
$image=$createFun($filename);
$color=imagecolorallocatealpha($image, 255,0,0,50);
$fontfile="../fonts/{$fontfile}";
imagettftext($image, 20, 0, 125, 110, $color, $fontfile, $text);
header("content-type:".$mime);
$outFun($image,$filename);
imagedestroy($image);
}