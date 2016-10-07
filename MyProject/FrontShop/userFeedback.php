<?php require_once '../conf/configs.php';?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link type="text/css" rel="stylesheet" href="carousel.css">
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="carousel.js"></script>
</head>
<body style="padding:50px;">
<?php $link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
				$sql="select pro_img,pro_name from user_feedback order by id desc";
				$i=0;
				error_reporting(1);
				$feedback=Array();
				$str=Array();
				$result=mysqli_query($link,$sql);
				while((($row=mysqli_fetch_array($result,MYSQLI_ASSOC))==null?0:1)&&$i<9){
					$str=explode("/",$row['pro_img']);
					$feedback[$i][1] = $str[1];
					$sql1="select id from pro where name = '{$row['pro_name']}'";
					$result1=mysqli_query($link,$sql1);
					while(($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))==null?0:1){
						$feedback[$i][0] = $row1['id'];
						$i++;
					}
				}
				mysqli_free_result($result);
						mysqli_close($link);?>
<div class="J_Poster poster-main" data-setting='{
                                                                                    "width":500,
                                                                                    "height":200,
                                                                                    "posterWidth":200,
                                                                                    "posterHeight":200,
                                                                                    "scale":0.8,
                                                                                    "autoPlay":true,
                                                                                    "delay":2000,
                                                                                    "speed":300
																					}'>
	<div class="poster-btn poster-prev-btn"></div>
    <ul class="poster-list"><?php for($i=0;$i<9;$i++):?>
    	<li class="poster-item" onclick="toBuying(<?php echo $feedback[$i][0];?>)"><a><img src="image/image_3/<?php echo $feedback[$i][1];?>"  width="100%" height="100%"></a></li>
    	<?php endfor;?>
    </ul>
    <div class="poster-btn poster-next-btn"></div>
</div>
<script>

$(function(){
	Carousel.init($(".J_Poster"));
});
function toBuying(id){
	console.log(id);
	window.open("buying.php?id="+id);
}
</script>
</body>
</html>