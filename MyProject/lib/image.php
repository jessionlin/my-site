<?php
require_once 'string.php';
header("content-type:text/html;charset = utf-8");
/**
 * 创建缩略图
 * @param string $filename
 * @param string $destination
 * @param int $dst_w
 * @param int $dst_h
 * @param string $isReservedSource
 * @param real $scale
 * @return string
 */
function thumb($filename,$destination=NULL,$dst_w=null,$dst_h=null,$isReservedSource=false,$scale = 0.5)
{
    list ($src_w, $src_h, $imagetype) = getimagesize($filename);
    if (is_null($dst_w) || is_null($dst_h)) {
        $dst_w = ceil($src_w * $scale);
        $dst_h = ceil($src_h * $scale);
    }

    $mime = image_type_to_mime_type($imagetype);
    $createFun = str_replace("/", "createfrom", $mime);
    $outFun = str_replace("/", null, $mime);
    $src_image = $createFun($filename);
    $dst_image=imagecreatetruecolor($dst_w, $dst_h);
    imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
    if($destination&&!file_exists(diname($destination))){
        mkdir(dirname($destination),0777,true);
    }
    $dstFilename=$destination==null?getUniName().".".getExt($filename):$destination;
    $outFun($dst_image,$dstFilename);
    imagedestroy($src_image);
    if(!$isReservedSource){
        unlink($filename);
    }
    return  $dstFilename;
}


/**
 * 创建验证码
 * @param number $line
 * @param number $pixel
 * @param number $type
 * @param number $length
 * @param string $sess_name
 */	
function verifyImage($line = 0,$pixel=0,$type = 1,$length = 4,$width = 80,$height = 28,$sess_name = "verify")
{
    $image = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);
    imagefilledrectangle($image, 1, 1, $width - 2, $height - 2, $white);
    $chars = buildRandomString($type, $length);
    $_SESSION[$sess_name] = $chars;
    $fontfiles = array(
        "MSFH.TTC",
        "MSYHBD.TTC",
        "MSYHL.TTC",
        "SIMLI.TTF",
        "SIMSUN.TTC",
        "SIMYOU.TTF"
    );
    for ($i = 0; $i < $length; $i ++) {
        $size = mt_rand(18, 22);
        $angle = mt_rand(- 15, 15);
        $x = 5 + $i * $size;
        $y = mt_rand(20, 26);
        $color = imagecolorallocate($image, mt_rand(70, 110), mt_rand(100, 220), mt_rand(90, 180));
        $text = substr($chars, $i, 1);
        $fontfile = "../fonts/" . $fontfiles[mt_rand(0, count($fontfiles) - 1)];
        imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
    }
    if ($pixel>0) {
        for ($i = 0; $i < $pixel; $i ++) {
            imagesetpixel($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), $black);
        }
    }
    if ($line) {
        for ($i = 0; $i < $line; $i ++) {
            $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
            imageline($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), mt_rand(0, $width - 1), mt_rand(0, $height - 1), $color);
        }
    }
    header("content-type:image/gif");
    imagegif($image);
    imagedestroy($image);
	return $chars;
}