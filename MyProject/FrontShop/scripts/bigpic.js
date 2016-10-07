$(document).ready(function(){
	//图片切换功能
	var objPic,objPrt;
	$(".smallPic").mouseover(function(){
		$(".bigPic").attr('src',  changeImage($(this).attr('src')));
		$(".part").attr('src',  changeImage($(this).attr('src')));
	objPic = document.getElementsByClassName('left')[0];	
	objPrt = document.getElementById('part');
	change(objPic,objPrt);
	});
	function changeImage(filename){
		var str = filename.split('/')[4];
		str = "../manage/image/image_1/"+str;
		return str;
	}
	// 实现放大图片的功能
	function change(objPic,objPrt){
	var bPicLeft = objPic.offsetLeft,
		bPicTop = objPic.offsetTop,
		objMsk = document.getElementsByClassName('mask')[0],
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
			 maskTop = (maskTop>486)?486:maskTop;
		}
		$(".mask").css({
			left: maskLeft,
			top: maskTop
		});

		var percentX = maskLeft/(objPic.offsetWidth-objMsk.offsetWidth);
		var percentY = maskTop/(objPic.offsetHeight-objMsk.offsetHeight);
		objPrt.style.left = -percentX*(objPrt.offsetWidth-objBig.offsetWidth) + "px";
		objPrt.style.top = -percentY*(objPrt.offsetHeight-objBig.offsetHeight-40) + "px";
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