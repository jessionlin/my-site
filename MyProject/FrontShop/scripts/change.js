$(document).ready(function(){
	//中央大图切换
	$(".clickitem").click(function(){
		$(".img_item").attr('display',"block");
		$(".right").attr('display',"block");
	});
});
function change(num){
	var click1=document.getElementById("click_1");
	var click2=document.getElementById("click_2");
	var click3=document.getElementById("click_3");
	var click4=document.getElementById("click_4");
	var img1=document.getElementById("img1");
	var img2=document.getElementById("img2");
	var img3=document.getElementById("img3");
	var img4=document.getElementById("img4");
	if(num==1){
		click1.style.backgroundColor="red";
		click2.style.backgroundColor="blue";
		click3.style.backgroundColor="blue";
		click4.style.backgroundColor="blue";
		img1.style.display="block";
		img2.style.display="none";
		img3.style.display="none";
		img4.style.display="none";

	}
	else if(num==2){
		click2.style.backgroundColor="red";
		click1.style.backgroundColor="blue";
		click3.style.backgroundColor="blue";
		click4.style.backgroundColor="blue";
		img2.style.display="block";
		img1.style.display="none";
		img3.style.display="none";
		img4.style.display="none";
	}
	else if(num==3){
		click3.style.backgroundColor="red";
		click2.style.backgroundColor="blue";
		click1.style.backgroundColor="blue";
		click4.style.backgroundColor="blue";
		img3.style.display="block";
		img2.style.display="none";
		img1.style.display="none";
		img4.style.display="none";
	}
	else if(num==4){
		click4.style.backgroundColor="red";
		click2.style.backgroundColor="blue";
		click3.style.backgroundColor="blue";
		click1.style.backgroundColor="blue";
		img4.style.display="block";
		img2.style.display="none";
		img3.style.display="none";
		img1.style.display="none";
	}
}
function toBuying(id){
	console.log(id);
	window.open="search.php?id="+id;
}