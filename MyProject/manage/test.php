<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
*{padding:0;margin:0}
body{
	background-color:#fff;
	color:#555;
	font-family:'Avenir Next','Lantinghei SC';
	font-size:14px;
	-webkit-font-smoothing:antialiased;
}
.wrap{
	width:100%;
	height:400px;
	position: absolute;
	top: 50%;
	margin-top: -200px;
	background-color: yellow;
	overflow: hidden;
	-webkit-perspective:800px;
}
.photo{
	width: 200px;
	height: 200px;
	position: absolute;
	z-index: 1;
	box-shadow: 0 0 1px rgba(0,0,0,.01);
}
.photo .side{
	width: 100%;
	height: 100%;
	background-color: #eee;
	position: absolute;
	top: 0;
	right: 0;
	padding: 20px;
	box-sizing: border-box;
}

.photo .side-front .image{
	width: 100%;
	height: 250px;
	line-height: 250px;
	overflow: hidden;
}
.photo .side-front .image img{
	width: 100%;
}
.photo .side-front .caption{
	text-align: center;
	font-size: 16px;
	line-height: 50px;
}
.photo .side-back{
	
}
.photo .side-back .desc{
	color: #666;
	font-size: 14px;
	line-height: 1.5em;
}

.photo_center{
	left: 50%;
	top: 50%;
	width: 260px;
	height: 260px;
	margin: -130px 0 0 -130px;
	z-index: 999;
}
.photo_wrap{
	position: absolute;
	width: 100%;
	height: 100%;

	-webkit-transform-style:preserve-3d;
	-webkit-transition: .3s ease-in;
}


.photo_wrap .side-front{
	-webkit-transform:rotateY(0deg);
}
.photo_wrap .side-back{
	-webkit-transform:rotateY(180deg);
}
.photo_wrap .side{
	-webkit-backface-visibility:hidden;
}

.photo_front .photo_wrap{
	-webkit-transform:rotateY(0deg) ;
}

.photo_back .photo_wrap{
	-webkit-transform:rotateY(180deg);
}
</style>
	<title>海报画廊</title>
</head>
<body onselectstart="return false;">
<div class="wrap" id="wrap">
	<div class="photo photo_center photo_front" onclick="turn(this)" id="photo_{{index}}">
		<div class="photo_wrap">
		<div class="side side-front">
			<p class="image"><img src="image/image_3/{{img}}"></p>
			<p class="caption">{{caption}}</p>
		</div>
		<div class="side side-back">
			<p class="desc">{{desc}}</p>
		</div>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
function g(selector){
	var method=selector.substr(0,1) == '.' ? 'getElementsByClassName' : 'getElementById';
	return document[method](selector.substr(1));

}
function random(range){
	var max = Math.max(range[0],range[1]);
	var min = Math.min(range[0],range[1]);

	var diff=max-min;
	var number = Math.ceil(Math.random() * diff + min);
	return number;
}


var data = data;
function addPhotos(){
	var template = g('#wrap').innerHTML;
	var html =[];
	for(s in data){
		var _html = template
						.replace('{{index}}',s)
						.replace('{{img}}',data[s].img)
						.replace('{{caption}}',data[s].caption)
						.replace('{{desc}}',data[s].desc);
		html.push(_html);
	}
	g('#wrap').innerHTML = html.join('');
	rsort(random([0,data.length]));
}

addPhotos();
function rsort(n){
	var _photo = g('.photo');
	var photo=[];
	for(s=0;s<_photo.length;s++){
		_photo[s].className = _photo[s].className.replace(/\s&*photo_center\s*/,'');
		photo.push(_photo[s]);
	}
	var photo_center = g('#photo_'+n);
	photo_center.className+='photo_center ';
}
function turn(elem){
	var cls=elem.className;
	if(/photo_front/.test(cls)){
		cls=cls.replace(/photo_front/,'photo_back');
	}else{
		cls=cls.replace(/photo_back/,'photo_front');
	}
	return elem.className = cls;
}
</script>
</html>


