<?php
require_once 'Controller.php';
require_once 'Models/CategoryModel.php';
class testC extends Controller{
	private $categoryModel;
	function __construct(){
		parent::__construct();
		$this->categoryModel=new CategoryModel();
	}
	
	function instance(){
		$a=new $this();
	}
	
	function sayHelloWorld($hello){
		$this->assign('hello', $hello);
		$this->display('helloworld.html');
	}
	
	function displayCategory(){
		$data=$this->categoryModel->getCategory('*');
		$this->assign('data', $data);
		$this->display('displaycategoryview.html');
	}
}

?>