<?php
/* Smarty version 3.1.30, created on 2016-09-16 07:03:39
  from "E:\wamp64\www\my-site\smarty\test\tpl\test1.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57db994b0a74d7_10296562',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '418f70132eb389f2b3848eb30db2045ec580e9f3' => 
    array (
      0 => 'E:\\wamp64\\www\\my-site\\smarty\\test\\tpl\\test1.tpl',
      1 => 1474009416,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57db994b0a74d7_10296562 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'E:\\wamp64\\www\\my-site\\smarty\\smarty\\plugins\\modifier.capitalize.php';
if (!is_callable('smarty_modifier_date_format')) require_once 'E:\\wamp64\\www\\my-site\\smarty\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->compiled->nocache_hash = '2808057db994b043ca7_54741137';
?>

<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['articletitle']->value);?>

<?php echo ($_smarty_tpl->tpl_vars['articletitle']->value).(" yesterday").(" and the day before yesterday.");?>

<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['time']->value,"%B %e, %Y  %H:%M:%S");?>

<?php echo (($tmp = @$_smarty_tpl->tpl_vars['articletitle1']->value)===null||$tmp==='' ? "no title" : $tmp);
}
}
