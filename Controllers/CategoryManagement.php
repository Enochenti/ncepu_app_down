<?php
require_once 'Controller.php';
require_once 'Models/CategoryModel.php';
require_once 'Models/AppModel.php';

class CategoryManagement{
	private $categoryModel;
	private $appModel;
	
	function  __construct(){
		parent::__construct();
		$this->categoryModel=new CategoryModel();
		$this->appModel=new AppModel();
	}
	
	function deleteACategory($categoryId){
		$data=$this->appModel->getApp('app_id',"app_category=$categoryId",0,1);
		if (empty($data)){
			echo 'Error: apps in this category is not empty!';
			exit();
		}else{
			$this->categoryModel->deleteCategory("category_id=$categoryId");
		}
	}
	
	function addACategory($categoryName,$categoryParent){
		if (!empty($this->categoryModel->
				getCategory('category_id',"category_name=$categoryName"))){
			echo 'Error: the category name is already exist ';
			exit();
		}else{
			$this->categoryModel->insertCategory(array('category_name'=>$categoryName,
					'categoryParent'=>$categoryParent));
		}
	}
}
?>