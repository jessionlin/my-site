<?php 

$str = "赖勇魁是头猪";
// $str1 = md5($str,true);
// echo $str1.",";
// $str2 = md5($str,false);
// echo $str2;
// echo "<hr/>";
// echo md5($str2);

// echo crypt($str);
// echo "<hr/>";
// echo crypt($str,'sb');

// echo sha1($str);
// echo "<hr/>";
// echo sha1($str,true);
// echo urlencode($str);
// $str1 = "this is a sentence";
// echo ",".urlencode($str1);
// echo "<hr/>";
// echo urldecode(urlencode($str)).",";
// echo "<hr/>";
// echo rawurlencode($str);
// echo "<hr/>";
// echo rawurldecode(rawurlencode($str));
$filename = "17.jpg";
$data = file_get_contents($filename);
echo base64_encode($data);
?>
