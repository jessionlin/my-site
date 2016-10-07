$(document).ready(function(){

	$(".img_11").mouseover(function(){
		$(".img_1").css('display','block');
		$(".img_2").css('display','none');
			var objPrt = document.getElementById('part');
		var objPic = document.getElementById('img_1');
		objPrt.src="images/107.jpg";
		change(objPic);
	});
	$(".img_21").mouseover(function(){
		$(".img_2").css("display","block");
		$(".img_1").css("display","none");
		var objPic = document.getElementById('img_2');
		var objPrt = document.getElementById('part');
		objPrt.src="images/301.jpg";
		change(objPic);
		console.log(2);
	});
	// 实现放大图片的功能
	function change(objPic){
	var bPicLeft = objPic.offsetLeft,
		bPicTop = objPic.offsetTop;
	var objMsk = document.getElementsByClassName('mask')[0],
		objPrt = document.getElementById('part'),
		objBig = document.getElementsByClassName('big_pic')[0];
	
	$(".transparent").mouseover(function(){
		$(".mask").css("display", "block");
		$(".big_pic").css("display", 'block');
		}).mouseout(function(){
		$(".mask").css("display", "none");
		$(".big_pic").css("display", "none");
	});

	$(".transparent").mousemove(function(e){
		var mX = e.clientX,
			mY = e.clientY;

		var maskLeft = mX-bPicLeft+document.body.scrollLeft;
		var maskTop = mY-bPicTop+document.body.scrollTop;

		// 判断遮罩层的left值
		if ( maskLeft<50 ) {
			 maskLeft = 0;
		}  else {
			 maskLeft = (maskLeft>450)?400:maskLeft-50;
		}
		// 判断遮罩层的top值
		if ( maskTop<128 ) {
			 maskTop = 78;
		} else {
			 maskTop = (maskTop>486)?486:maskTop-50;
		}
		$(".mask").css({
			left: maskLeft,
			top: maskTop
		});

		var percentX = maskLeft/(objPic.offsetWidth-objMsk.offsetWidth);
		var percentY = maskTop/(objPic.offsetHeight-objMsk.offsetHeight);
		objPrt.style.left = -percentX*(objPrt.offsetWidth-objBig.offsetWidth) + "px";
		objPrt.style.top = -percentY*(objPrt.offsetHeight-objBig.offsetHeight-118) + "px";
	});

	// 设置被放大的部分图片的位置
	$(".big_pic").css("left", bPicLeft+530+"px");}
});
// function changeImage(filename){
// 		var img1 = document.getElementById("img_1");
// 		var img2 = document.getElementById("img_2");
// 		if(filename == '107.jpg'){
// 			img1.style.display = "block";
// 			img2.style.display = "none";
// 		}
// 		else if(filename == '301.jpg'){
// 			img2.style.display = "block";
// 			img1.style.display = "none";
// 		}
// 	}