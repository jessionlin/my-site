<?php session_start();$_SESSION['admin']=null;?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.login{
	width: 50%;
	height: 500px;
	align:center;
	position: relative;
	float: left;
	margin-left: 300px;
	margin-top: 0px;
}
.login .table tr td input{
	width:100%;
	height:20px;
}
.login .table {
	margin:0px auto;
}
</style>
	<title>登录</title>
</head>
<body>
<div style="width:100%;height:60px;background-color: #5B00AE;position:relative;top:-50px;align:center;color:#FFFFFF;font-size:50px;font-family:'隶书';text-align:center;">
	<h3>15手工制品商城</h3>
</div>
<div style="width: 30%;height:60px;background-color:#B15BFF;top:-100px;align:center;color:#FFFFFF;font-size:50px;font-family:'隶书';text-align:center;position:relative;">
	<h4>用户登录</h4>
</div>
<div class="login">
	<form action="doAdLogin.php" method="post">
		<table class="table" style="border-width: 1px;" cellspacing="1" cellpadding="5" border="0" align="center" width="100%">
			<tr height="60px">
				<td width="20%" align="center">管理员姓名</td>
				<td width="40%" align="center"><input type="text" name="username" id="user" onmouseout="testIfTrue(0)"></td>
				<td width="40%" align="left"><input id="ifTrue_1" value="" style="display: block;color:red;font-size:15px;border-width:0;"></td>
			</tr>
			<tr height="60px">
				<td width="20%" align="center">管理员密码</td>
				<td width="40%" align="center"><input type="password" name="password" id="password" onmouseout="testIfTrue(1)"></td>
				<td width="40%" align="left"><input id="ifTrue_2" value="" style="display: block;color:red;font-size:15px;border-width:0;"></input></td>
			</tr>
			<tr height="60px">
				<td width="20%" align="center">请输入验证码:</td>
				<td width="40%" align="center"><input type="text" name="verify"></td>
			</tr>
			<tr height="60px">
				<td width="20%" align="center"><img id="verifyImage" src="getVerify.php"></td>
				<td width="40%" align="center"><a href="" name="reVerify" style="text-decoration: none;color:#007500" onClick="changeVerify()">看不清，请换一张</a></td>
			</tr>
			<tr height="60px">
				<div width="60%"><button class="log" style="color:red;width:60%;position:absolute;bottom:205px;height:40px;font-size:20px;font-family:'楷体'">登录</button></div>
			</tr>
		</table>
	</form>
</div>
</body>
<script type="text/javascript">
function changeVerify(){
	var change = document.getElementById("verifyImage");
	var src = window.location = "getVerify.php";
	change.style.src = src;
}
function testIfTrue(num){
	if(num == 0){
		var test = document.getElementById("user");
		var test_play = document.getElementById("ifTrue_1");
		test_play.style.color="red";
		var pattern = /(\d|\w)+(\_?)(\1)*/;
		if(test.value.match(pattern)){
			test_play.value="管理员可用";
			test_play.style.color="green";
		}else{
			test_play.value="管理员名不可用";
			test.value="";
		}
	}
	else if(num == 1){
		var test = document.getElementById("password");
		var test_play = document.getElementById("ifTrue_2");
		test_play.style.color="red";
		var pattern = /(\d|\w)+/;
		var result;
		if(result =(test.value.match(pattern))){
			var num = result[0].length;
			if(num < 4){
				test_play.value="密码过短，最少4位";
			}
			else if(num > 20){
				test_play.value="密码过长，最多20位";
			}
			else if(num>=4&&num<=20){
				test_play.value="密码可用";
				test_play.style.color="green";
			}
		}else{
			test_play.value="密码不可用";
			test.value="";
		}
	}
	test_play.style.display = "block";
	
}

</script>
</html>
