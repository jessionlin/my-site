<?php
define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

$a = "sjdfklasdfjlaksd1";
$smarty -> assign("a", $a);
$smarty -> display("J_test1.dwt");

?>