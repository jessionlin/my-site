<?php
	function getNumber($link,$sql){
		$result=mysqli_query($link,$sql);
		$i=0;
		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$i++;
		}
		return $i;
	}
	
	function getPro($page,$pageSize=4){
		$link=mysqli_connect("localhost","root","","myproject");
		$sql="select * from pro";
		echo $sql;
		$page=(int)$page;
		$totalRows=getNumber($link,$sql);
		$totalPage=ceil($totalRows/$pageSize);
		if($page<1||$page==null||!is_numeric($page))$page=1;
		if($page>$totalPage)$page=$totalPage;
		$offset=($page-1)*$pageSize;
		$sql="select * from pro limit {$offset},{$pageSize}";
		return $sql;
	}
	
	function up(){
		echo "我进入了";
		$_SESSION['page_pro'] = (int)$_SESSION['page_pro'] + 1;
		$page=$_SESSION['page_pro'];
		$sql=getPro($page,$_SESSION['page_size']);
		$result=mysqli_query($link,$sql);
		$_SESSION['sql']=$sql;
		echo $_SESSION['sql'];
	}
	
	function down(){
		$_SESSION['page_pro'] = (int)$_SESSION['page_pro'] - 1;
	}
	
	function firstPage(){
		$_SESSION['page_pro'] = 1;
		$page=$_SESSION['page_pro'];
		$sql=getPro($page,$_SESSION['page_size']);
		echo "<span>我进入首页了</span>";
		$_SESSION['sql'] = $sql;
	}
	
	function lastPage($pageSize=4){
		$_SESSION['page_pro'] = ceil((getNumber($link,$sql))/$pageSize);
	}
?>
