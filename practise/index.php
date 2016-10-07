<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
<body>
 <button id="btn">11111</button>
 <div id="box" style="font-size: 30px;"></div>
</body>
<script type="text/javascript" >
$("#btn").click(function(){
// 	$.get('demo1.php',{'username':'科学家','age':30},function(data){
// 		$("#box").html(data);
// 	});
// 	$.post('demo1.php',{'username':'科学家','age':30},function(data){
// 		$("#box").html(data);
// 	});
	$.ajax({
		'url':'demo1.php',
		'data':{'username':'科学家','age':18},
		'success':function(data){
			$("#box").html(data);
		},
		'dataType':'html',
		'type':'post',
	});
});

function addCart(productid){
	var url = "addCart.php";
	var data ={'productid':productid,'num':$parseInt(("#number").val())}
	var success = function(response){
		if(responce.errno==0){
			alert("加入购物车成功");
		}
	}
	$.post(url,data,success,"json");
}
</script>
</html>
