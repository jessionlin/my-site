<?php
$file="704.jpg";
$filename="uploads/image/".$file;
list($src_w,$src_h,$imagetype) = getimagesize($filename);
$mime=image_type_to_mime_type($imagetype);
$createFun=str_replace("/", "createfrom", $mime);
$outFun=str_replace("/", null, $mime);
$src_image=$createFun($filename);
// $dst_50_image=imagecreatetruecolor(500, 508);
// $dst_220_image=imagecreatetruecolor(250, 300);
// $dst_350_image=imagecreatetruecolor(200, 200);
$dst_800_image=imagecreatetruecolor(640, 270);
// imagecopyresampled($dst_50_image, $src_image, 0,0,0,0, 500,508, $src_w, $src_h);
// imagecopyresampled($dst_220_image, $src_image, 0,0,0,0, 250,300, $src_w, $src_h);
// imagecopyresampled($dst_350_image, $src_image, 0,0,0,0, 200,200, $src_w, $src_h);
imagecopyresampled($dst_800_image, $src_image, 0,0,0,0, 640, 270, $src_w, $src_h);
// $outFun($dst_50_image,"uploads/image_50/".$file);
// $outFun($dst_220_image,"uploads/image_220/".$file);
// $outFun($dst_350_image,"uploads/image_350/".$file);
$outFun($dst_800_image,"uploads/img/".$file);
// echo $filename;
imagedestroy($src_image);
// imagedestroy($dst_50_image);
// imagedestroy($dst_220_image);
// imagedestroy($dst_350_image);
imagedestroy($dst_800_image);
// $src_image=imagecreatefromjpeg($filename);
// list($src_w,$src_h)=getimagesize($filename);
// $scale=0.5;
// $dst_w=ceil($src_w*$scale);
// $dst_h=ceil($src_h*$scale);
// $dst_image=imagecreatetruecolor($dst_w, $dst_h);
// imagecopyresampled($dst_image, $src_image, 0,0,0,0, $dst_w, $dst_h, $src_w, $src_h);
// header("content-type:image/jpeg");
// imagejpeg($dst_image);
// imagedestroy($src_image);
// imagedestroy($dst_image);

// $filename="des_big.jpg";
// list($src_w,$src_h,$imagetype)=getimagesize($filename);
// $mime=image_type_to_mime_type($imagetype);
// //echo $mime;//image/jpeg,image/gif
// $createFun=str_replace("/", "createfrom", $mime);
// //imagejpeg()
// $outFun=str_replace("/",null,$mime);
// $src_image=$createFun($filename);
// $dst_800_image=imagecreatetruecolor(800, 800);
// imagecopyresampled($dst_800_image, $src_image, 0,0,0,0, 800, 800, $src_w, $src_h);
// $outFun($dst_800_image,"uploads/image_800/".$filename);
// imagedestroy($src_image);
// imagedestroy($dst_800_image);