<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Practise</title>
</head>
<body>






<!-- 
<?php if(is_array($person)): $i = 0; $__LIST__ = array_slice($person,1,3,true);if( count($__LIST__)==0 ) : echo "没有数据" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>-------<?php echo ($data['age']); ?><br/><?php endforeach; endif; else: echo "没有数据" ;endif; ?> -->
<!-- 
<?php if(is_array($person)): foreach($person as $key=>$data): echo ($data['name']); ?>-------<?php echo ($data['age']); ?><br/><?php endforeach; endif; ?>
<?php $__FOR_START_525__=1;$__FOR_END_525__=10;for($k=$__FOR_START_525__;$k <= $__FOR_END_525__;$k+=1){ echo ($k); } ?>
<?php if($number > 10): ?>num大于10
<?php elseif($number == 10): ?>num等于10
<?php else: ?>num小于10<?php endif; ?>
<?php switch($name): case "laoshi": case "banzhang": ?>ss<?php break;?>
<?php case "xiaohong": ?>tt<?php break;?>
<?php case "xiaoming": ?>ww<?php break;?>
<?php default: ?>bfgf<?php endswitch;?>
<?php if(($number) == "10"): ?>num=10<?php endif; ?>
<?php if(($number) == "10"): ?>num=10<?php else: ?>num!=10<?php endif; ?> 
<?php if(in_array(($num), explode(',',"1,2,3"))): ?>数据在范围中<?php endif; ?>
<?php if(!in_array(($num), explode(',',"2,3"))): ?>数据不在区间中<?php endif; ?> 
<?php if(in_array(($num), explode(',',"1,2,3"))): ?>数据在范围中<?php else: ?>数据不再区间内<?php endif; ?>
<?php $_RANGE_VAR_=explode(',',"1,10");if($num>= $_RANGE_VAR_[0] && $num<= $_RANGE_VAR_[1]):?>数据在范围中<?php else: ?>数据不在范围中<?php endif; ?>
<?php $_RANGE_VAR_=explode(',',"10,100");if($num<$_RANGE_VAR_[0] && $num>$_RANGE_VAR_[1]):?>数据不在范围中<?php endif; ?>
<?php if(in_array(($num), explode(',',"1,11,12"))): ?>有11这个数<?php else: ?>没有11这个数<?php endif; ?>
<?php echo ($num>11?"大于11":"不大于11"); ?>-->
<?php if(is_array($person)): foreach($person as $key=>$data): if(($data["age"]) >= "18"): echo ($data["name"]); ?>已经成年了<?php else: echo ($data["name"]); ?>还是个孩子<?php endif; endforeach; endif; ?>
<?php echo $person[1]['name']; ?>
</body>
</html>