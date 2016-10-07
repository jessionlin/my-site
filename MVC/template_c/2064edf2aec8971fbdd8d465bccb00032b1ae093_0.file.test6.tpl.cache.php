<?php
/* Smarty version 3.1.30, created on 2016-09-16 11:31:14
  from "E:\wamp64\www\my-site\smarty\test\tpl\test6.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57dbd8026f3850_30099206',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2064edf2aec8971fbdd8d465bccb00032b1ae093' => 
    array (
      0 => 'E:\\wamp64\\www\\my-site\\smarty\\test\\tpl\\test6.tpl',
      1 => 1474025470,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57dbd8026f3850_30099206 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_block_test2')) require_once 'E:\\wamp64\\www\\my-site\\smarty\\smarty\\plugins\\block.test2.php';
$_smarty_tpl->compiled->nocache_hash = '3177057dbd8026acab4_92607507';
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('test2', array('replace'=>'true','maxnum'=>29));
$_block_repeat1=true;
echo smarty_block_test2(array('replace'=>'true','maxnum'=>29), null, $_smarty_tpl, $_block_repeat1);
while ($_block_repeat1) {
ob_start();
?>

<?php echo $_smarty_tpl->tpl_vars['str']->value;?>

<?php $_block_repeat1=false;
echo smarty_block_test2(array('replace'=>'true','maxnum'=>29), ob_get_clean(), $_smarty_tpl, $_block_repeat1);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);
}
}
