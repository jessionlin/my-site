<?php
define('IN_ECS', true);
  require(dirname(__FILE__) . '/includes/init.php');
//  require(dirname(__FILE__) . '/includes/lib_main.php');
//  require(dirname(__FILE__) . '/includes/cls_template.php');
// require(ROOT_PATH . 'includes/lib_order.php');
//require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/user.php');
//require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/shopping_flow.php');
$name="jession";
$smarty->assign("title","practise");
$smarty->assign("password","19970115");
$smarty->assign("email","1754317747@qq.com");
$smarty->assign("name",$name);
$smarty->display("J_test1.dwt");


