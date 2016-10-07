<?php 
function realiseImage($filename,$size_w=50,$size_h=50){
list($src_w,$src_h,$imagetype)=getimagesize($filename);
$mime=image_type_to_mime_type($imagetype);
//echo $mime;//image/jpeg,image/gif
$createFun=str_replace("/", "createfrom", $mime);
//imagejpeg()
$outFun=str_replace("/",null,$mime);
$src_image=$createFun($filename);
$dst_image=imagecreatetruecolor($size_w, $size_h);
imagecopyresampled($dst_image, $src_image, 0,0,0,0, $size_w, $size_h, $src_w, $src_h);
$str = explode("/",$filename);
if($size_w==500&&$size_h==508){
	$filename="image/image_1/".$str[1];
}elseif($size_w==250&&$size_h==300){
	$filename="image_2/".$str[1];
}elseif($size_w==200&&$size_h==200){
	$filename="image_3/".$str[1];
}
elseif($size_w==100&&$size_h==100){
	$filename="image_4/".$str[1];
}
$outFun($dst_image,$filename);
imagedestroy($src_image);
imagedestroy($dst_image);
}







