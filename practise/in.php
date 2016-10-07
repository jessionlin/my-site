<?php 
        echo "<script>alert("+"加入0"+");</script>";
 		header("content-type:image/jpeg");
 		echo "<script>alert("+"加入1"+");</script>";
        $img = imagecreatefromjpeg("images/top/bg.jpg");
        echo "<script>alert('加入2');</script>";
        $color = imagecolorallocate($img, 25, 25, 136);
        $font = "SIMYOU.TTF";
        $to = "你是";
        imagettftext($im, 80, 0, 200, 200, $color, $font, $to);
        imagejpeg($img,"images/1_10.jpg");
        imagedestroy($img);?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
</body>
<script type="text/javascript">
	alert("加入3");
</script>
</html>