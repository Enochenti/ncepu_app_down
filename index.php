<?php
$uri=$_SERVER['REQUEST_URI'];
$paramArray=array();
$paramArray=preg_split('/[=?&]+/', $uri);
$controllerName=$paramArray[1];
$includePath="Controllers/$controllerName.php";
require_once "$includePath";

$test=call_user_func(array($controllerName,'create'),$controllerName);
$method=$paramArray[2];
$param='';
for ($i=3;$i<count($paramArray);$i++){
	if ($i==count($paramArray)-1){
		$param.=$paramArray[$i];
	}else{
		$param.=$paramArray[$i].',';
	}
}
$test->$method($param);
?>