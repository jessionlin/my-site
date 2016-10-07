<?php
require_once '../smarty/Smarty.class.php';
$smarty = new Smarty();
//配置
$smarty->left_delimiter = "{";//左定界符
$smarty->right_delimiter = "}";//右定界符
$smarty->template_dir="tpl";//html模板的地址
$smarty->compile_dir = "template_c";//模板编译生成的文件
$smarty->cache_dir = "cache";//缓存
//开启缓存的另外两个配置
$smarty->caching = true;//开启缓存
$smarty->cache_lifetime = 120;//缓存时间

// $smarty->assign('articletitle','文章标题');
// $arr = array('articlecontent'=>array('title'=>'smarty的学习','author'=>'小明'));
// $smarty->assign('arr',$arr);
// $smarty->display('test.tpl');

// $smarty->assign('articletitle','i ate an apple');
// $smarty->assign('time',time());
// $smarty->assign('articletitle1','');
// $smarty->display('test1.tpl');

// $smarty->assign('url','http://www.imooc.com/course/video/?mid=680');
// $smarty->assign('articletitle','Happy New Year');
// $smarty->assign('articlecontent','开心的一天
//     开心的一天
//     开心的一天');
// $smarty->display('test2.tpl');


// $smarty->assign('score',91);

// $articlelist = array(
//     array(
//        "title"=>"第一篇文章",
//         "author"=>"小王",
//         "content"=>"第一篇文章该写点啥呢"
//     ),
//     array(
//         "title"=>"第二篇文章",
//         "author"=>"小李",
//         "content"=>"又写了一篇不知所云的文章"
//     )
// );
// $articlelist = array();
// $smarty->assign("articlelist",$articlelist);
// $smarty->display('test3.tpl');
// $smarty->display('test0.tpl');

// class My_Object {
//     function meth1($params){
//         return $params[0].'已经'.$params[1];
//     }
// }
// $myobj = new My_Object();
// $smarty->assign('myobj',$myobj);
// $smarty->display('test4.tpl');

// $smarty->assign('time',time());
// $smarty->assign('str','abcdefg');

// function test($params){
//     $p1 = $params['p1'];
//     $p2 = $params['p2'];
//     return '传入的参数1值为'.$p1.',传入的参数2值为'.$p2;
// }

// $smarty->registerPlugin('function','f_test','test');
// $smarty->display('test5.tpl');

// $smarty->display('area.tpl');

// $smarty->assign('time',time());
// $smarty->display('datetime.tpl');

$smarty->assign('str','Hello，my name is HanMeiMei。How are you？');
$smarty->display('test6.tpl');
