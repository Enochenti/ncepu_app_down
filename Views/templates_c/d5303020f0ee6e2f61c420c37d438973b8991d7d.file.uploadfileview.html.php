<?php /* Smarty version Smarty-3.1.19, created on 2014-09-30 08:13:14
         compiled from "/home/jiong/workspace/ncepu_app_down/Views/templates/uploadfileview.html" */ ?>
<?php /*%%SmartyHeaderCode:1603902217542a61c8a35819-00968130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5303020f0ee6e2f61c420c37d438973b8991d7d' => 
    array (
      0 => '/home/jiong/workspace/ncepu_app_down/Views/templates/uploadfileview.html',
      1 => 1412064789,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1603902217542a61c8a35819-00968130',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_542a61c8b24b08_46070423',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542a61c8b24b08_46070423')) {function content_542a61c8b24b08_46070423($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>upload file</title>
</head>
<body>
<form name='upload_file' method='post'  enctype='multipart/form-data' 
	action='index.php?UpdateFile&uploadFile'>
文件名：<input name='app_name' type='text'/><br/>
版本号：<input name='app_version'  type='text'/><br/>
来源：    <input name='app_source' type='text'/><br/>
描述：    <textarea name='app_description'></textarea><br/>
文件：    <input type='file' name='file'/><br/>
<input name='submit'  type='submit' value='上传'/>
</form>
</body>
</html><?php }} ?>
