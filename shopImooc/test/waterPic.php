<?php
$srcFile="../images/logo.jpg";
$dstFile="../images/des_big.jpg";
waterPic($dstFile);
function waterPic($dstFile, $srcFile = "../images/logo.jpg",$pct=30)
{
    $srcFileInfo = getimagesize($srcFile);
    $src_w = $srcFileInfo[0];
    $src_h = $srcFileInfo[1];
    $dstFileInfo = getimagesize($dstFile);
    $srcMime = $srcFileInfo['mime'];
    $dstMime = $dstFileInfo['mime'];
    $createSrcFun = str_replace("/", "createfrom", $srcMime);
    $createDstFun = str_replace("/", "createfrom", $dstMime);
    $outDstFun = str_replace("/", null, $dstMime);
    $dst_im = $createDstFun($dstFile);
    $src_im = $createSrcFun($srcFile);
    header("content-type:" . $dstMime);
    imagecopymerge($dst_im, $src_im, 0, 0, 0, 0, $src_w, $src_h, $pct);
    $outDstFun($dst_im, $dstFile);
    imagedestroy($dst_im);
    imagedestroy($src_im);
}