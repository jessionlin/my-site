<?php
/* Smarty version 3.1.30, created on 2016-09-16 11:09:30
  from "E:\wamp64\www\my-site\smarty\test\tpl\datetime.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57dbd2ea98d9e9_26863661',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bec8f20cc62c60dbebc008c1da3076bee798beba' => 
    array (
      0 => 'E:\\wamp64\\www\\my-site\\smarty\\test\\tpl\\datetime.tpl',
      1 => 1474024168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57dbd2ea98d9e9_26863661 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_test')) require_once 'E:\\wamp64\\www\\my-site\\smarty\\smarty\\plugins\\modifier.test.php';
$_smarty_tpl->compiled->nocache_hash = '2796457dbd2ea954c57_41786346';
echo smarty_modifier_test($_smarty_tpl->tpl_vars['time']->value,'Y-m-d H:i:s');
}
}
