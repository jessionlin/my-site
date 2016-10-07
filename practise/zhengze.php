<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div><?php 
         
?></div>
</body>
<script type="text/javascript">
var pattern = /(\d|\w)+@(((\w+)\.)+)((com\.cn)|com|cn){1}/;
var str = "1754317747@qq.com";
// var str1 = "26012ddf21linjia@sti.sit.edu.com.cn";
var result=str.match(pattern);
document.write(result.index);
if(result){
	alert('匹配成功'+result);
}else{
	alert('匹配失败');
}
// var pattern = /Java/g;
// var text = "JavaScript is more fun than Java";
// var result;
// while((result = pattern.test(text))){
// 	alert(result);
// }
</script>
</html>
