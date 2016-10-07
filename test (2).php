<?php
require_once '../connect.php';
require_once '..b/mysql.func.php';

session_start();

if ( isset($_COOKIE['userName']) || isset($_SESSION['userName']) ) {
	$flag = 1;
} else {
	$flag = 0;
}


$id = $_REQUEST['id'];

// ��ȡid=$id���鼮��Ϣ
$sql = "select * from obtp_book where id = {$id}";
$res = fetchOne($sql);

// ��ȡ���鼮��ͼƬ
$sql = "select * from obtp_album where aId = {$id}";
$rows = fetchAll($sql);

// ��ȡ�鼮��������Ϣ
$sql = "select * from obtp_judge where book = '{$res['bookname']}' and shop = '{$res['shop']}' order by time asc";
$result = fetchAll($sql);
$comend = array();
foreach($result as $rs){
	if ( $rs['judge']&&$rs['level'] ) {
		$comend[] = $rs;
	}
}
if ( count($comend)<10 ) {
	$height = "auto";
} else {
	$height = "600px";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>book</title>
	<link type="text/css" rel="stylesheet" href="styles/book.css"/>
	<script type="text/javascript" src="scripts/jquery.js"></script>
	<script type="text/javascript" src="scripts/book.js"></script>
	<style type="text/css" rel="stylesheet">
	.title{width: 100%; height: 80px; background-color: #33f; text-align: center; line-height: 80px; font-size: 25px; color: #fff;}
.both{ width: 1000px; height: 500px; margin: 0 auto; margin-top: 20px;}
.picture{position: relative; width: 400px; height: 500px; float: left;}
.picture .bigPic{width: 400px; height: 400px; border: 2px solid #ccc; box-shadow: 0 0 8px #DDD;}
.picture .mask{position: absolute; width: 100px; height: 100px; opacity: 0.5; background-color: #0A0A0A; display: none;}
.picture .transparent{position: absolute; top: 2px; left: 2px; width: 400px; height: 400px;}
.picture .piclist{width: 400px; height: 80px; margin-top: 20px;}
.picture .smallPic{width: 60px; height: 60px; margin: 10px 10px 0 0; border: 1px solid #d9d9d9; box-shadow: 0 0 8px #DDD;}
.bigger{position: absolute; display: none; width: 100px; height: 100px; left: 440px; top:110px; border: 1px solid #e00ee0; overflow: hidden; z-index: 1;}
.bigger img{position: absolute; border: 0; z-index: 5;}
.message{width: 500px; height: 500px; float: right;}
.message > div {margin-top: 10px;}
.bookname{margin-top: 10px; width: 100%; height: 50px; line-height: 50px; font-size: 20px; font-weight: bold;}
.getNum{width: 100%; height: 30px;}
.getNum div{float: left; height: 20px; text-align: center; line-height: 20px;}
.getNum .minus, .getNum .plus{width: 20px;  border: 1px solid #e0e0e0; cursor: pointer;}
.getNum .imnus{border-radius: 3px 3px 0 0 ;}
.getNum .num{ width: 40px; border: 1px solid #e9e9e9;}
.addCar, .buy{width: 100px; height: 40px; background-color: #B22222; border-radius: 5px; text-align: center; line-height: 40px; color: #fff; cursor: pointer;}
.judges{width: 1000px; /*height: 600px;*/ margin: 0 auto; margin-top: 50px;}
.judge_title{width: 100%; height: 50px; line-height: 50px; border-bottom: 10px solid #A020F0;}
.judge{width: 100%; height: 60px; border-bottom: 1px solid #000;}
.level .round{float: left; width: 20px; height: 20px; border-radius: 10px; border: 1px solid #e0e0e0;}
	</style>
	<script type="text/javascript">
		window.onload = function(){
			$(".plus").click(function(){
				num = $(".num").html();
				// $.type() ����������������ڵ���������
				// type = $.type(num);
				num = parseInt(num);
				if ( num!=<?php echo $res['restnum'];?> ) {
					$(".num").html(num+1);
				}
			});
		}
	</script>
</head>
<body>
	<div class="title">���齻��ƽ̨</div>
	<div class="both">
		<div class="picture">
			<img class="bigPic" src="../pictures/<?php echo $rows[0]['aPic'];?>" />
			<div class="mask"></div>
			<div class="transparent"></div>
			<div class="piclist">
			<?php foreach ( $rows as $row ):?>
				<img class="smallPic" src="../pictures/<?php echo $row['aPic'];?>" />
			<?php endforeach;?>
			</div>
		</div>
		<div class="bigger"><img class="part" src="../pictures/<?php echo $rows[0]['aPic'];?>" alt="" /></div>
		<div class="message">
			<div class="bookname"><?php echo $res['bookname'];?></div>
			<div class="shop">��꣺<?php echo $res['shop'];?></div>
			<div class="author">���ߣ�<?php echo $res['author'];?></div>
			<div class="type">���ͣ�<?php echo $res['type'];?></div>
			<div class="price">�۸񣺣�<?php echo $res['price'];?></div>
			<div class="restnum">ʣ��������<?php echo $res['restnum'];?></div>
			<div class="getNum"><div>������</div>
				<div class="minus" title="��">-</div><div class="num">1</div><div class="plus" title="��">+</div>
			</div>
			<div class="addCar" onclick="add(<?php echo $id;?>, '<?php echo $res['bookname'];?>', <?php echo $res['price'];?>, <?php echo $flag;?>, '<?php echo $res['shop'];?>')">���빺�ﳵ</div>
			<div class="buy" onclick="buy(<?php echo $id;?>, '<?php echo $res['bookname'];?>', <?php echo $res['price'];?>, <?php echo $flag;?>, '<?php echo $res['shop'];?>')">����</div>
		</div>
	</div>
	<div class="judges" style="height:<?php echo $height;?>;">
		<div class="judge_title">��������</div>
		<?php
		foreach( $comend as $co ):
			$color = array(5);
			for ( $i=0; $i<5; $i++ ) {
				if ( $co['level']>$i ) {
					$color[$i] = "red";
				} else {
					$color[$i] = "gray";
				}
			}
		?>
			<div class="judge">
				<div class="name"><?php echo $co['user'];?></div>
				<div class="level">
					<?php for ( $i=0; $i<5; $i++ ){?>
					<div class="round" style="background:<?php echo $color[$i];?>;"></div>
					<?php }?>
				</div>
				<div class="word"><?php echo $co['judge'];?></div>
			</div>
		<?php endforeach;?>
	</div>
</body>
<script  type="text/javascript">
$(document).ready(function(){
	$(".smallPic").click(function(){
		$(".bigPic").attr('src',  $(this).attr('src'));
		$(".part").attr('src',  $(this).attr('src'));
	});
	$(".minus").click(function(){
		num = $(".num").html();
		num = parseInt(num);
		if ( num!=1 ) {
			$(".num").html(num-1);
		}
	});

	// ʵ�ַŴ�ͼƬ�Ĺ���
	var bPicLeft = document.getElementsByClassName("picture")[0].offsetLeft,
		bPicTop = document.getElementsByClassName("picture")[0].offsetTop;

	var objPic = document.getElementsByClassName('picture')[0],
		objMsk = document.getElementsByClassName('mask')[0],
		objPrt = document.getElementsByClassName('part')[0],
		objBig = document.getElementsByClassName('bigger')[0];

	console.log(bPicLeft+","+bPicTop);
	
	$(".transparent").mouseover(function(){
		$(".mask").css("display", "block");
		$(".bigger").css("display", 'block');
	}).mouseout(function(){
		$(".mask").css("display", "none");
		$(".bigger").css("display", "none");
	});

	$(".transparent").mousemove(function(e){
		var mX = e.clientX,
			mY = e.clientY;

		var maskLeft = mX-bPicLeft+document.body.scrollLeft;
		var maskTop = mY-bPicTop+document.body.scrollTop;

		// �ж����ֲ��leftֵ
		if ( maskLeft<50 ) {
			 maskLeft = 0;
		}  else {
			 maskLeft = (maskLeft>350)?300:maskLeft-50;
		}
		// �ж����ֲ��topֵ
		if ( maskTop<50 ) {
			 maskTop = 0;
		} else {
			 maskTop = (maskTop>350)?300:maskTop-50;
		}
		$(".mask").css({
			left: maskLeft,
			top: maskTop
		});

		var percentX = maskLeft/(objPic.offsetWidth-objMsk.offsetWidth);
		var percentY = maskTop/(objPic.offsetHeight-objMsk.offsetHeight);

		objPrt.style.left = -percentX*(objPrt.offsetWidth-objBig.offsetWidth) + "px";
		objPrt.style.top = -percentY*(objPrt.offsetHeight-objBig.offsetHeight) + "px";
		
	});

	// ���ñ��Ŵ�Ĳ���ͼƬ��λ��
	$(".bigger").css("left", bPicLeft+440+"px");

});

function add(id, book, price, log, shop) {
	if ( log ) {
		var num = $(".num").html();
		window.location.href = "doAction.php?act=addcar&id="+ id +"&book=" + book + "&price=" + price + "&num=" + num + "&shop=" + shop;
	} else {
		if ( confirm("���ȵ�¼") ) {
			window.location.href = "login.php";
		}
	}
	
}
function buy(id, book, price, log, shop) {
	if ( log ) {
		var num = $(".num").html();
		window.location.href = "doAction.php?act=addorder&id="+ id +"&book=" + book + "&price=" + price + "&num=" + num + "&shop=" + shop;
	} else {
		if ( confirm("���ȵ�¼") ) {
			window.location.href = "login.php";
		}
	}
}

</script>
<html>