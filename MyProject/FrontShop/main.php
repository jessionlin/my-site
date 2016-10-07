<?php
require_once '../include.php';
require_once '../conf/configs.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="styles/sort.css">
<script type="text/javascript" src="scripts/jquery-1.6.4.js"></script>
<link type="text/css" rel="stylesheet" href="styles/img.css">
<link type="text/css" rel="stylesheet" href="styles/order.css">
<link type="text/css" rel="stylesheet" href="styles/showTime.css">
<script type="text/javascript" src="scripts/change.js"></script>
	<title>15手工制品商城</title>
</head>
<body>
<div class ="login">
				<?php 
				session_start();
				if($_SESSION['loginFlag']):?>
				<span>欢迎您</span><?php echo $_SESSION['username'];?>
				<a class="top"href="doAction.php?act=userOut">[退出]</a>
				<?php else:?>
				<a class="top"href="login.php">[登录]</a><a class="top"href="reg.php">[免费注册]</a>
				<?php endif;?>
				<a class="top"href="shopBox.php" style="position: absolute;left: 700px;"><span>购物车</span></a>
				<div style="float:right;">
					<a href="../manage/adLogin.php">管理员登录</a>
				</div>
	
</div>
<div class="search"><form action="search.php" method="post">
	<div class="search_box">
		<input class="search_text" type="text" name="content"/>	
	</div>
	<button class="search_click">搜索</button></form>
</div>
<div class="choose">
	<ul>
		<li>手工制品种类</li><?php $row=array('','民族传统手工制品','创意手工制品','情人节手工制品','儿童手工制品','手工服饰','金属手工制品','木制品');?>
		<?php for($i=1;$i<8;$i++):?>
		<li><a href="search.php?wheres=<?php echo $row[$i];?>"><?php echo $row[$i];?>></a>
			<ul>
				<li><iframe class="sort" src="showPro.php?sort=<?php echo $row[$i];?>"  frameborder="0" style="width:470px;" name="sort" height="460px;"></iframe></li> 
			</ul>
		</li>
		<?php endfor;?>
	</ul>	
</div>
<div class="order">
	<form action="doOrder.php" method="post">
	<ul>
		<li><span>定制手工制品</span></li>
		<li>
			<select id="material" name="material">
				<option value="0">请选择材料</option>
				<option value="1">纸质</option>
				<option value="2">金属</option>
				<option value="3">塑料</option>
				<option value="4">植物制品</option>
				<option value="5">动物制品</option>
				<option value="6">木制品</option>
			</select>
		</li>
		<li>
			<select id="size" name="size">
				<option value="0">请选择大小</option>
				<option value="1">0.5dm^3以内</option>
				<option value="2">0.5dm^3-0.75dm^3</option>
				<option value="3">0.75dm^3-1.00dm^3</option>
				<option value="4">1.00dm^3-1.25dm^3</option>
				<option value="5">1.25dm^3-1.50dm^3</option>
			</select>
		</li>
		<li>
			<select id="time" name="time">
				<option value="0">请选择定制时间</option>
				<option value="1">1日</option>
				<option value="2">1-3日</option>
				<option value="3">3-5日</option>
				<option value="4">5-7日</option>
				<option value="5">7日以上</option>
			</select>
		</li>
		<li><textarea cols="16" rows="5"placeholder="请输入备注" name="comment"></textarea></li>
		<li><input  class="submit" type="submit" value="提交" /></li>
	</ul></form>
</div>
<?php $link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
				$sql="select id,details,factory,name from pro order by name desc";
				$i=0;
				$det=Array();
				$result=mysqli_query($link,$sql);
				while((($row=mysqli_fetch_array($result,MYSQLI_ASSOC))==null?0:1)&&$i<4){
					$det[$i][0]=$row['id'];
					$det[$i][1]=$row['name'];
					$det[$i][2]=$row['factory'];
					$det[$i][3]=$row['details'];
					$sql1="select img_1 from pro_img where proid='{$row['id']}'";
					$result1=mysqli_query($link,$sql1);
					while(($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))==null?0:1){
						$det[$i][4]='../manage/'.$row1['img_1'];
					}
					$i++;
				}
				mysqli_free_result($result);
						mysqli_close($link);?>
<div class="img">
<div class="img_1"id="img1">
		<a href="buying.php?id=<?php echo $det[0][0];?>"><img class="left" src="<?php echo $det[0][4];?>"></a>
	<div class="right">
		<ul>
			<li>名称:<a href="#"><?php echo $det[0][1];?></a></li>
			<li>卖家:<a href="#"><?php echo $det[0][2];?></a></li>
			<li>简介:<a href="#"><?php echo $det[0][3];?></a></li>
		</ul>
	</div>
</div>
<div class="img_2" id="img2">
		<a href="buying.php?id=<?php echo $det[1][0];?>"><img class="left" src="<?php echo $det[1][4];?>"></a>
	<div class="right">
		<ul>
			<li>名称:<a href="#"><?php echo $det[1][1];?></a></li>
			<li>卖家:<a href="#"><?php echo $det[1][2];?></a></li>
			<li>简介:<a href="#"><?php echo $det[1][3];?></a></li>
		</ul>
	</div>
</div>
<div class="img_3" id="img3">
		<a href="buying.php?id=<?php echo $det[2][0];?>"><img class="left" src="<?php echo $det[2][4];?>"></a>
	<div class="right">
		<ul>
			<li>名称:<a href="#"><?php echo $det[2][1];?></a></li>
			<li>卖家:<a href="#"><?php echo $det[2][2];?></a></li>
			<li>简介:<a href="#"><?php echo $det[2][3];?></a></li>
		</ul>
	</div>
</div>
<div class="img_4" id="img4">
		<a href="buying.php?id=<?php echo $det[3][0];?>"><img class="left" src="<?php echo $det[3][4];?>"></a>
	<div class="right">
		<ul>
			<li>名称:<a href="#"><?php echo $det[3][1];?></a></li>
			<li>卖家:<a href="#"><?php echo $det[3][2];?></a></li>
			<li>简介:<a href="#"><?php echo $det[3][3];?></a></li>
		</ul>
	</div>
</div>
<div class="click">
		<a class="click_1" onclick="change(1)" id="click_1"></a>
		<a class="click_2" onclick="change(2)"id="click_2"></a>
		<a class="click_3" onclick="change(3)"id="click_3"></a>
		<a class="click_4" onclick="change(4)"id="click_4"></a>
	</div>
</div>
<div class="choose_by_factory">
	<ul>
		<li>生产厂家或个人</li>
		<?php for($i=1;$i<14;$i++):?>
		<li><a href="search.php?wheress=<?php echo $i;?>号工厂"><?php echo $i;?>号工厂></a>
			<ul>
				<li><iframe class="sort" src="showPro.php?factory=<?php echo $i;?>号工厂"  frameborder="0" style="width:470px;" name="sort" height="460px;"></iframe></li> 
			</ul>
		</li>
		<?php endfor;?>
	</ul>
</div>
<div class="imgse">
	<?php $link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
				$sql="select id,details from pro order by price desc";
				$i=0;
				$name=Array();
				$result=mysqli_query($link,$sql);
				while((($row=mysqli_fetch_array($result,MYSQLI_ASSOC))==null?0:1)&&$i<4){
					$name[$i][0]=$row['id'];
					$name[$i][1]=$row['details'];
					$sql1="select img_2 from pro_img where proid='{$row['id']}'";
					$result1=mysqli_query($link,$sql1);
					while(($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))==null?0:1){
						$name[$i][2]='../manage/'.$row1['img_2'];
					}
					$i++;
				}
				mysqli_free_result($result);
						mysqli_close($link);?>
	<div class="imgsea"><a href="buying.php?id=<?php echo $name[0][0];?>"><img src="<?php echo $name[0][2];?>"></a>
		<a href="#"><div><span><?php echo $name[0][1];?></span></div></a>
	</div>
	<div class="imgseb"><a href="buying.php?id=<?php echo $name[1][0];?>"><img src="<?php echo $name[1][2];?>"></a>
		<a href="#"><div><span><?php echo $name[1][1];?></span></div></a>
	</div>
	<div class="imgsec"><a href="buying.php?id=<?php echo $name[2][0];?>"><img src="<?php echo $name[2][2];?>"></a>
		<a href="#"><div><span><?php echo $name[2][1];?></span></div></a>
	</div>
	<div class="imgsed"><a href="buying.php?id=<?php echo $name[3][0];?>"><img src="<?php echo $name[3][2];?>"></a>
		<a href="#"><div><span><?php echo $name[3][1];?></span></div></a>
	</div>
</div>
<div class="feedback"><form method="post" action="doUserAdv.php">
	<div class="feedback_a"><span>请把您的建议反馈给我们!</span></div>
	<div><textarea class="feedback_b" cols=40 rows=4 name="details"></textarea></div>
	<button>提交</button></form>
</div>
<div class="userMes">
	<a href="userMes.php?name=<?php echo $_SESSION['username'];?>"><img src="../manage/img/ss.jpg"></a>
</div>
<div class="the_last">
	<div class="the_last_title">
		<p>最</p>
		<p>热</p>
		<p>商</p>
		<p>品</p>
	</div>
	<?php $link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
				$sql="select id,details from pro order by soldnumber desc";
				$i=0;
				$hot=Array();
				$result=mysqli_query($link,$sql);
				while((($row=mysqli_fetch_array($result,MYSQLI_ASSOC))==null?0:1)&&$i<6){
					$hot[$i][0]=$row['id'];
					$hot[$i][1]=$row['details'];
					$sql1="select img_3 from pro_img where proid='{$row['id']}'";
					$result1=mysqli_query($link,$sql1);
					while(($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))==null?0:1){
						$hot[$i][2]='../manage/'.$row1['img_3'];
					}
					$i++;
				}
				mysqli_free_result($result);
						mysqli_close($link);?>
	<div class="the_last_detail">
		<div class="the_last_detail_a"><a href="buying.php?id=<?php echo $hot[0][0];?>"><img src="<?php echo $hot[0][2];?>"></a>
			<a href=""><div><span><?php echo $hot[0][1];?></span></div></a>
		</div>
		<div class="the_last_detail_b"><a href="buying.php?id=<?php echo $hot[1][0];?>"><img src="<?php echo $hot[1][2];?>"></a>
			<a href=""><div><span><?php echo $hot[1][1];?></span></div></a>
		</div>
		<div class="the_last_detail_c"><a href="buying.php?id=<?php echo $hot[2][0];?>"><img src="<?php echo $hot[2][2];?>"></a>
			<a href=""><div><span><?php echo $hot[2][1];?></span></div></a>
		</div>
		<div class="the_last_detail_d"><a href="buying.php?id=<?php echo $hot[3][0];?>"><img src="<?php echo $hot[3][2];?>"></a>
			<a href=""><div><span><?php echo $hot[3][1];?></span></div></a>
		</div>
		<div class="the_last_detail_e"><a href="buying.php?id=<?php echo $hot[4][0];?>"><img src="<?php echo $hot[4][2];?>"></a>
			<a href=""><div><span><?php echo $hot[4][1];?></span></div></a>
		</div>
		<div class="the_last_detail_f"><a href="buying.php?id=<?php echo $hot[5][0];?>"><img src="<?php echo $hot[5][2];?>"></a>
			<a href=""><div><span><?php echo $hot[5][1];?></span></div></a>
		</div>
	</div><form action="search.php?where=order by soldnumber desc&index=1" method="post">
	<button class="the_last_list" value="01" name="content"><h1>更<br/>多<br/>》</h1></button></form>
</div>
<div class="the_hottest">
	<div class="the_hottest_title">
		<p>最</p>
		<p>新</p>
		<p>商</p>
		<p>品</p>
	</div>
	<?php $link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
				$sql="select id,details from pro order by id desc";
				$i=0;
				$new=Array();
				$result=mysqli_query($link,$sql);
				while((($row=mysqli_fetch_array($result,MYSQLI_ASSOC))==null?0:1)&&$i<6){
					$new[$i][0]=$row['id'];
					$new[$i][1]=$row['details'];
					$sql1="select img_3 from pro_img where proid='{$row['id']}'";
					$result1=mysqli_query($link,$sql1);
					while(($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))==null?0:1){
						$new[$i][2]='../manage/'.$row1['img_3'];
					}
					$i++;
				}
				mysqli_free_result($result);
						mysqli_close($link);?>
	<div class="the_hottest_detail">
		<div class="the_hottest_detail_a"><a href="buying.php?id=<?php echo $new[0][0];?>"><img src="<?php echo $new[0][2];?>"></a>
			<a href=""><div><span><?php echo $new[0][1];?></span></div></a>
		</div>
		<div class="the_hottest_detail_b"><a href="buying.php?id=<?php echo $new[1][0];?>"><img src="<?php echo $new[1][2];?>"></a>
			<a href=""><div><span><?php echo $new[1][1];?></span></div></a>
		</div>
		<div class="the_hottest_detail_c"><a href="buying.php?id=<?php echo $new[2][0];?>"><img src="<?php echo $new[2][2];?>"></a>
			<a href=""><div><span><?php echo $new[2][1];?></span></div></a>
		</div>
		<div class="the_hottest_detail_d"><a href="buying.php?id=<?php echo $new[3][0];?>"><img src="<?php echo $new[3][2];?>"></a>
			<a href=""><div><span><?php echo $new[3][1];?></span></div></a>
		</div>
		<div class="the_hottest_detail_e"><a href="buying.php?id=<?php echo $new[4][0];?>"><img src="<?php echo $new[4][2];?>"></a>
			<a href=""><div><span><?php echo $new[4][1];?></span></div></a>
		</div>
		<div class="the_hottest_detail_f"><a href="buying.php?id=<?php echo $new[5][0];?>"><img src="<?php echo $new[5][2];?>"></a>
			<a href=""><div><span><?php echo $new[5][1];?></span></div></a>
		</div>
	</div><form action="search.php?where=order by id desc" method="post">
	<button class="the_hottest_list" value="01" name="content"><h1>更<br/>多<br/>》</h1></button></form>
</div>
<div class="create">
	<form action="doCreate.php" method="post">
	<div><img src="img/1_3.jpg"></div>
	<div class="create_area"><textarea cols="25" rows="5"placeholder="亲,有什么创意就记录下来吧"name="details"></textarea></div>
	<div class="create_circle_a">&nbsp</div>
	<div class="create_circle_b">&nbsp</div>
	<div class="create_circle_c">&nbsp</div>
	<div class="create_circle_d">&nbsp</div>
	<div class="create_circle_e">&nbsp</div>
	<button>提交</button>
	</form>
</div>
<div class="user_feedback">
	<iframe src="userFeedback.php"  frameborder="0" style="width:100%;" name="userFeedback" height="350px;"></iframe>
	<div class="user_feedback_details">
		<form action="doAction.php?act=feedback" method="post">
		<table style="border-width: 1px;font-size:30px;color:red;" cellspacing="2" align="center" border="1">
			<tr>
				<td>商品名称:</td>
				<td><input type="text" name="pro_name"/></td>
			</tr>
			<tr>
				<td>商品评价:</td>
				<td><textarea cols="20" rows="4" name="comment"></textarea></td>
			</tr>
			<button >提交</button>
		</table></form>
	</div>
</div>
</body>
</html>