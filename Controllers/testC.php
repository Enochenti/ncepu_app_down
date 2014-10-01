<?php
require_once 'Controller.php';
class testC extends Controller{
	function __construct(){
		parent::__construct();
	}
	
	function instance(){
		$a=new $this();
	}
	
	function sayHelloWorld($hello){
		$this->assign('hello', $hello);
		$this->display('helloworld.html');
	}
}

?>