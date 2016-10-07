<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>导航条的动画效果</title>
</head>
<body>
<table width="871" height="339" border="0" align="center" cellpadding="0" cellspacing="0"
 background="images/bg.GIF" class="tableBorder">
  <tr>
    <td valign="top"><table width="100%" height="26"  border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><div align="right" style="color:#FFFFFF "> </div></td>
        </tr>
      </table>
        <table width="100%" height="119" border="0" cellpadding="0" cellspacing="0">
          <script language="javascript">
	  //鼠标移动效果
	  var A_Img=new Image();
	  function move(image,num){
	  	image.src='images/menu_0'+num+'_over.gif';
	  }
	  function out(image,num){
		image.src='images/menu_0'+num+'.gif';
	  }	  
	  </script>
          <tr>
            <td width="180">&nbsp;</td>
            <td width="96" align="center"><a href="index.php"><img src="images/menu_01.gif" id="image1" width="95" height="119" border="0" onMouseMove="move(this,'1')" onMouseout="out(this,'1')"></a></td>
            <td width="95" align="center"><a href="index.php"><img src="images/menu_02.gif" id="image2" width="95" height="119" border="0" onMouseMove="move(this,'2')" onMouseout="out(this,'2')"></a></td>
            <td width="95" align="center"><a href="produce_zs.php"><img src="images/menu_03.gif" name="image3"  width="95" height="119" border="0" onMouseMove="move(this,'3')" onMouseout="out(this,'3')"></a></td>
            <td width="94" align="center"><a href="honour.php"><img src="images/menu_04.gif" name="image4" width="94" height="119" border="0" onMouseMove="move(this,'4')" onMouseout="out(this,'4')"></a></td>
            <td width="95" align="center"><a href="service.php"><img src="images/menu_05.gif" name="image5" width="95" height="119" border="0" onMouseMove="move(this,'5')" onMouseout="out(this,'5')"></a></td>
            <td width="94" align="center"><a href="instructor.php"><img src="images/menu_06.gif" name="image6" width="94" height="119" border="0" onMouseMove="move(this,'6')" onMouseout="out(this,'6')"></a></td>
            <td width="95" align="center"><a href="#"><img src="images/menu_07.gif" width="95" name="image7" height="119" border="0" onMouseMove="move(this,'7')" onMouseout="out(this,'7')"></a></td>
            <td width="27">&nbsp;</td>
          </tr>
        </table>
        <table width="100%" height="193"  border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="38%">&nbsp;</td>
            <td width="43%"><div align="center">
            </div></td>
            <td width="19%" valign="bottom"></td>
          </tr>
      </table></td>
  </tr>
</table>
</body>
</html>

