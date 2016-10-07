<?php
/* Smarty version 3.1.30, created on 2016-09-16 08:48:46
  from "E:\wamp64\www\my-site\smarty\test\tpl\test5.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57dbb1ee3e8c80_19303348',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8b4f4f00a275a8644a763ff52f47944321e1c15' => 
    array (
      0 => 'E:\\wamp64\\www\\my-site\\smarty\\test\\tpl\\test5.tpl',
      1 => 1474015621,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57dbb1ee3e8c80_19303348 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '232257dbb1ee3826d2_49172959';
echo date("Y-m-d",$_smarty_tpl->tpl_vars['time']->value);?>

<?php echo str_replace('d','h',$_smarty_tpl->tpl_vars['str']->value);?>


<?php echo test(array('p1'=>'abc','p2'=>'edf'),$_smarty_tpl);
}
}
