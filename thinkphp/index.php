<?php
//common 存放当前项目的公共函数
//Conf 存放当前项目的配置文件
//Lang 存放当前项目的语言包
//Lib 存放当前项目的控制器和模型
//Runtime 存放当前项目的运行时的文件
//Tpl 存放当前项目的模板文件
//M C  LIB
//V     Tpl
/**
 * 1.加载thinkphp.php 
 * 2.加载核心文件 ./thinkPHP/LIB/core
 * 3.加载项目的文件  分析URL 调用相关控制器
 * m model 模块 控制器
 * a action 方法  action=页面
 * @var unknown
 */
// $module=isset($_GET['m'])?$_GET['m']:'Index';
// $action=isset($_GET['a'])?$_GET['a']:'Index';
// $mooc = new $module();
// $mooc->$action();
// class test{
//     function __construct(){
//         echo '调用了test控制器<br/>';
//     }
//     function test(){
//         echo 'test控制器的test方法';
//     }
// }
// class index{
//     function __construct(){
//         echo '调用了index控制器<br/>';
//     }
//     function index(){
//         echo 'index控制器的index方法';
//     }
// }
// exit;
define('APP_DEBUG',true);
define('APP_NAME', 'App');
define('APP_PATH', './App/');
require_once './ThinkPHP/ThinkPHP.php';

