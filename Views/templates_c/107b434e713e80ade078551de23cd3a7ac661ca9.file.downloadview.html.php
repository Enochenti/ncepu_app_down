<?php /* Smarty version Smarty-3.1.19, created on 2014-09-30 21:55:10
         compiled from "/home/jiong/workspace/ncepu_app_down/Views/templates/downloadview.html" */ ?>
<?php /*%%SmartyHeaderCode:1226058993542aab41954580-70715081%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '107b434e713e80ade078551de23cd3a7ac661ca9' => 
    array (
      0 => '/home/jiong/workspace/ncepu_app_down/Views/templates/downloadview.html',
      1 => 1412085306,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1226058993542aab41954580-70715081',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_542aab4198d2c8_07092176',
  'variables' => 
  array (
    'data' => 0,
    'aData' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542aab4198d2c8_07092176')) {function content_542aab4198d2c8_07092176($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Download View</title>
</head>
<body>
<?php  $_smarty_tpl->tpl_vars['aData'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aData']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aData']->key => $_smarty_tpl->tpl_vars['aData']->value) {
$_smarty_tpl->tpl_vars['aData']->_loop = true;
?>
	<a href=index.php?DownloadFile&download&<?php echo $_smarty_tpl->tpl_vars['aData']->value['app_id'];?>
><?php echo $_smarty_tpl->tpl_vars['aData']->value['app_name'];?>
</a>
<?php } ?>
</body>
</html><?php }} ?>
