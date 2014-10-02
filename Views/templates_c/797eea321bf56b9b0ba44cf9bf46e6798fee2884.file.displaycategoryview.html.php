<?php /* Smarty version Smarty-3.1.19, created on 2014-10-01 12:38:47
         compiled from "Views/templates/displaycategoryview.html" */ ?>
<?php /*%%SmartyHeaderCode:639167016542b841e8191f7-53780800%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '797eea321bf56b9b0ba44cf9bf46e6798fee2884' => 
    array (
      0 => 'Views/templates/displaycategoryview.html',
      1 => 1412138323,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '639167016542b841e8191f7-53780800',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_542b841e85a672_14276521',
  'variables' => 
  array (
    'data' => 0,
    'aData' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542b841e85a672_14276521')) {function content_542b841e85a672_14276521($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Download View</title>
</head>
<body>
<?php  $_smarty_tpl->tpl_vars['aData'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['aData']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['aData']->key => $_smarty_tpl->tpl_vars['aData']->value) {
$_smarty_tpl->tpl_vars['aData']->_loop = true;
?>
	<?php echo $_smarty_tpl->tpl_vars['aData']->value['category_name'];?>
<br/>
<?php } ?>
</body>
</html><?php }} ?>
