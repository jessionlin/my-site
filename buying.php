<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="js/jquery-1.6.4.js"></script>
<script type="text/javascript" src="js/bigpic.js"></script>
<link type="text/css" rel="stylesheet" href="styles/details.css">
	<title>商品详细信息</title>
</head>
<body>
<div style="width:100%;height:60px;background-color: #5B00AE;position:relative;top:-50px;align:center;color:#FFFFFF;font-size:50px;font-family:'隶书';text-align:center;">
<h3>15手工制品商城</h3>
</div>
<div class="left">
	<div class="up">
	<img id="img_1" class="img_1" src="images/107.jpg" style="display: block;">
	<img id="img_2" class="img_2" src="images/301.jpg" style="display: none;">
	</div>
	<div class="down">
	<a href="#"><img class="img_11" src="images/1071.jpg"></a>
	<a href="#"><img class="img_21" src="images/3011.jpg"></a>
	</div>
</div>
<div class="mask"></div>
<div class="transparent"></div>
<div class="big_pic"style="border: 1px solid #e00ee0;z-index: 9;"><img id="part" src="images/107.jpg"></div>
<div class="right">
	<div class="pro_name"><span>商品名称</span></div>
	<table class="table" style="border-width: 1px;font-size: 30px;" cellspacing="1" cellpadding="5" border="0" align="left" width="70%">
		<tr height="60px">
			<td width="40%">商品分类:</td>
			<td width="60%"><span>儿童手工制品</span></td>
		</tr>
		<tr height="60px">
			<td width="40%">商品厂家:</td>
			<td width="60%"><span>01号工厂</span></td>
		</tr>
		<tr height="60px">
			<td width="40%">商品剩余数目:</td>
			<td width="60%"><span>6</span></td>
		</tr>
		<tr height="60px">
			<td width="40%">商品价格:</td>
			<td width="60%"><span>6.00</span></td>
		</tr>
		<tr height="60px">
			<td width="40%">商品购买数目:</td>
			<td width="60%">
				<div class="num">
					<a href="#" onClick="changeNum('minus')"><div class="num-">-</div></a>
					<input type="text" value="1" id="buy_num"/>
					<a href="#" onClick="changeNum('add')"><div class="numadd" >+</div></a>
				</div>
			</td>
		</tr>
	</table>
		<div class="buying"><button>购买</button></div>
</div>
</body>
<script type="text/javascript">
	function changeNum(op){
		var nums =document.getElementById("buy_num");
		num = parseInt(nums.value);
		if(op=="minus"){
			if(num>1){
			num--;
			}else;
		}
		else if(op=="add"){
			num++;
		}
		//alert(num);
		nums.value=num.toString();
	}
</script>
</html>