<?php
/* Smarty version 3.1.30, created on 2016-09-16 08:13:30
  from "E:\wamp64\www\my-site\smarty\test\tpl\test3.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57dba9aaecfef6_76780409',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0272c4d524e6ed58ae931964f6f436c1920eeb4' => 
    array (
      0 => 'E:\\wamp64\\www\\my-site\\smarty\\test\\tpl\\test3.tpl',
      1 => 1474013608,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57dba9aaecfef6_76780409 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '735457dba9aadceb49_11876920';
?>

<?php if ($_smarty_tpl->tpl_vars['score']->value > 90) {?>
优秀
<?php } elseif ($_smarty_tpl->tpl_vars['score']->value > 60) {?>
及格
<?php } else { ?>
不及格
<?php }?>


<?php
$__section_article_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_article']) ? $_smarty_tpl->tpl_vars['__smarty_section_article'] : false;
$__section_article_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['articlelist']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_article_0_total = min(($__section_article_0_loop - 0), 1);
$_smarty_tpl->tpl_vars['__smarty_section_article'] = new Smarty_Variable(array());
if ($__section_article_0_total != 0) {
for ($__section_article_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_article']->value['index'] = 0; $__section_article_0_iteration <= $__section_article_0_total; $__section_article_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_article']->value['index']++){
?>
	<?php echo $_smarty_tpl->tpl_vars['articlelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_article']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_article']->value['index'] : null)]['title'];?>

	<?php echo $_smarty_tpl->tpl_vars['articlelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_article']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_article']->value['index'] : null)]['author'];?>

	<?php echo $_smarty_tpl->tpl_vars['articlelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_article']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_article']->value['index'] : null)]['content'];?>

<br />
<?php
}
}
if ($__section_article_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_article'] = $__section_article_0_saved;
}
?>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articlelist']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
	<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>

	<?php echo $_smarty_tpl->tpl_vars['article']->value['author'];?>

	<?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>

<br />
<?php
}
} else {
?>

当前没有文章
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<br />
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articlelist']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
	<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>

	<?php echo $_smarty_tpl->tpl_vars['article']->value['author'];?>

	<?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>

<br />
<?php
}
} else {
?>

当前没有文章
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
}
}
