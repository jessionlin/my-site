<?php
header("content-type:image/jpeg");       			//定义输出为图像类型
$im=imagecreatefromjpeg("images/P1020494.JPG");		//载入照片
$textcolor=imagecolorallocate($im,25,25,136);		//设置字体颜色为蓝色，值为RGB颜色值
$font="Font/mzd.ttf";      			//定义字体
$to="落霞与孤鹜齐飞";
imagettftext($im,80,0,200,200,$textcolor,$font,$to);      	//写TTF文字到图中
$to="秋水共长天一色";
imagettftext($im,80,0,300,400,$textcolor,$font,$to);      	//写TTF文字到图中
imagejpeg($im);       								//建立JPEG图形
imagedestroy($im);    								//结束图形，释放内存空间
?>
