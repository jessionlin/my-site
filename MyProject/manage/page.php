<?php
function showPage($page,$totalPage,$where=null,$sep="&nbsp;"){
	$where=($where==null)?null:"&".$where;
	$url = $_SERVER ['PHP_SELF'];
	$index = ($page == 1) ? "首页" : "<a href='{$url}?page=1{$where}'>首页</a>";
	$last = ($page == $totalPage) ? "尾页" : "<a href='{$url}?page={$totalPage}{$where}'>尾页</a>";
	$prevPage=($page>=1)?$page-1:1;
	$nextPage=($page>=$totalPage)?$totalPage:$page+1;
	$prev = ($page == 1) ? "上一页" : "<a href='{$url}?page={$prevPage}{$where}'>上一页</a>";
	$next = ($page == $totalPage) ? "下一页" : "<a href='{$url}?page={$nextPage}{$where}'>下一页</a>";
	$str = "总共{$totalPage}页/当前是第{$page}页";
	$p = null;
	for($i = 1; $i <= $totalPage; $i ++) {
		//当前页无连接
		
		if ($page == $i) {
			$p .= "[{$i}]";
		} else {
			$p .= "<a href='{$url}?page={$i}{$where}'>[{$i}]</a>";
		}
	}
 	$pageStr=$str.$sep . $index .$sep. $prev.$sep . $p.$sep . $next.$sep . $last;
 	return $pageStr;
}

function getSqlNum($link,$sql){
	$result=mysqli_query($link,$sql);
	$i=0;
	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
		$i++;
	}
	return $i;
}

/*缩略图*/
function realiseImage($filename,$size_w=100,$size_h=100){
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
	$filename="image/image_2/".$str[1];
}elseif($size_w==200&&$size_h==200){
	$filename="image/image_3/".$str[1];
}
elseif($size_w==100&&$size_h==100){
	$filename="image/image_4/".$str[1];
}
$outFun($dst_image,$filename);
imagedestroy($src_image);
imagedestroy($dst_image);
return $filename;
}



