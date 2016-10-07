<?php
require_once 'common.php';
session_start();
if(!$_SESSION['admin']){
	alertMes('未登录无法进入后台，请先登录!','adLogin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="styles/backManager.css">
	<title></title>
</head>
<body>
<div class="title">
	<div><p>15手工制品商城后台管理中心</p></div>
</div>
<div class="admin">
	<ul>
		<li>欢迎您：<span><?php echo $_SESSION['admin'];?>&nbsp</span></li>
		<li><a href="adLogin.php">退出</a></li>
	</ul>
</div>
<div class="main">
	<div class="right">
                <div class="title_1" align="center">后台管理</div>
      	 		<!-- 嵌套网页开始 -->         
                <iframe src="adminMes.php"  frameborder="0" name="mainFrame" width="100%" height="900" ></iframe>
                <!-- 嵌套网页结束 -->   
	</div>
	<div class="left">
		<div class="title_2">管理员</div>
		<ul class="list">
			<li>
				 <h3><span onclick="show('menu1','change1')" id="change1">+</span>商品管理</h3>
                        <dl id="menu1" style="display:none;">
                        	<dd><a href="addPro.php" target="mainFrame">添加商品</a></dd>
                            <dd><a href="listPro.php?page=1" target="mainFrame">商品列表</a></dd>
							<dd><a href="proSold.php?page=1" target="mainFrame">商品售出列表</a></dd>
							<dd><a href="listOrd.php?page=1" target="mainFrame">商品定制列表</a></dd>
                        </dl>
			</li>
			<li>
				 <h3><span onclick="show('menu2','change2')" id="change2">+</span>用户管理</h3>
                        <dl id="menu2" style="display:none;">
                        	<dd><a href="addUser.php" target="mainFrame">添加用户</a></dd>
                            <dd><a href="listUser.php?page=1" target="mainFrame">用户列表</a></dd>
							<dd><a href="createAdv.php?page=1" target="mainFrame">用户创新点列表</a></dd>
							<dd><a href="userAdv.php?page=1" target="mainFrame">用户意见列表</a></dd>
							<dd><a href="userFeedback.php?page=1" target="mainFrame">用户反馈列表</a></dd>
                        </dl>
			</li>
			<li>
				 <h3><span onclick="show('menu3','change3')" id="change3">+</span>管理员管理</h3>
                        <dl id="menu3" style="display:none;">
                        	<dd><a href="addAdmin.php" target="mainFrame">添加管理员</a></dd>
                            <dd><a href="listAdmin.php?page=1" target="mainFrame">管理员列表</a></dd>
                        </dl>
			</li>
		</ul>
	</div>
</div>
<script type="text/javascript">
    	function show(num,change){
	    		var menu=document.getElementById(num);
	    		var change=document.getElementById(change);
	    		if(change.innerHTML=="+"){
	    				change.innerHTML="-";
	        	}else{
						change.innerHTML="+";
	            }
    		   if(menu.style.display=='none'){
    	             menu.style.display='';
    		    }else{
    		         menu.style.display='none';
    		    }
        }
    </script>
</body>
</html>