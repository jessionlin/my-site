<?php
// $curlobj=curl_init();
// curl_setopt($curlobj, CURLOPT_URL, "http://www.baidu.com");
// curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);
// $output=curl_exec($curlobj);
// curl_close($curlobj);
// echo str_replace("百度", "屌丝", $output);

/**
 * 通过调用webservice查询北京的天气
 */
// $data = 'theCityName=北京';
// $curlobj=curl_init();
// curl_setopt($curlobj, CURLOPT_URL, "http://www.webxml.com.cn/WebServices/WeatherWebService.asmx/getWeatherbyCityName");
// curl_setopt($curlobj, CURLOPT_HEADER, 0);
// curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($curlobj, CURLOPT_POST, 1);
// curl_setopt($curlobj, CURLOPT_POSTFIELDS, $data);
// curl_setopt($curlobj, CURLOPT_HTTPHEADER, array("application/x-www-form-urlencode;
//             charset=utf-8",
//             "Content-length:".strlen($data)
// ));
// $rtn = curl_exec($curlobj);
// if(!curl_errno($curlobj)){
//     echo $rtn;
// }
// else{
//     echo 'Curl error:'.curl_error($curlobj);
// }
// curl_close($curlobj);

// $data = 'username=1754317747@qq.com&password=LINJIAXUAN0115&remember=1';
// $curlobj=curl_init();
// curl_setopt($curlobj, CURLOPT_URL, "http://www.imooc.com/user/login");
// curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);
// date_default_timezone_set('PRC');
// curl_setopt($curlobj, CURLOPT_COOKIESESSION, TRUE);
// curl_setopt($curlobj, CURLOPT_COOKIEFILE,"cookiefile");
// curl_setopt($curlobj, CURLOPT_COOKIEJAR,"cookiefile");
// curl_setopt($curlobj, CURLOPT_COOKIEN, session_name()."=".session_id());
// curl_setopt($curlobj, CURLOPT_HEADER,0);
// curl_setopt($curlobj, CURLOPT_FOLLOWLOCATION, 1);
// curl_setopt($curlobj, CURLOPT_POST, 1);
// curl_setopt($curlobj, CURLOPT_POSTFIELDS, $data);
// curl_setopt($curlobj, CURLOPT_HTTPHEADER, array("application/x-www-form-urlencode;
//             charset=utf-8",
//             "Content-length:".strlen($data)
// ));
// curl_exec($curlobj);
// curl_setopt($curlobj, CURLOPT_URL, "http://www.imooc.com/space/index");
// curl_setopt($curlobj, CURLOPT_POST, 0);
// curl_setopt($curlobj, CURLOPT_HTTPHEADER, array("Content-type:text/xml"));
// $output=curl_exec($curlobj);
// curl_close($curlobj);
// echo $output;


$curlobj=curl_init();
curl_setopt($curlobj, CURLOPT_URL, "https://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.js");
curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, 1);
date_default_timezone_set('PRC');
curl_setopt($curlobj,CURLOPT_SSL_VERIFYPEER, 0);
$output=curl_exec($curlobj);
curl_close($curlobj);
echo $output;