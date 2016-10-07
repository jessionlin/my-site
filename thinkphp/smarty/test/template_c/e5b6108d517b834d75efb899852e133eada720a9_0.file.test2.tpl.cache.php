<?php
/* Smarty version 3.1.30, created on 2016-09-16 07:14:30
  from "E:\wamp64\www\my-site\smarty\test\tpl\test2.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57db9bd6ce8960_53832090',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e5b6108d517b834d75efb899852e133eada720a9' => 
    array (
      0 => 'E:\\wamp64\\www\\my-site\\smarty\\test\\tpl\\test2.tpl',
      1 => 1474010065,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57db9bd6ce8960_53832090 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1608157db9bd6c95008_01092080';
?>

<?php echo rawurlencode($_smarty_tpl->tpl_vars['url']->value);?>


<?php echo mb_strtolower($_smarty_tpl->tpl_vars['articletitle']->value, 'UTF-8');?>

<?php echo mb_strtoupper($_smarty_tpl->tpl_vars['articletitle']->value, 'UTF-8');?>


<?php echo nl2br($_smarty_tpl->tpl_vars['articlecontent']->value);
}
}
