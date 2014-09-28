<?php
require_once '../Models/AppModel.php';
class UpdateFile extends Controller{
	private $appModel;
	function __construct(){
		$this->appModel=new AppModel();
	}
	
	function scanPackageMessage(){
		
	}
	
	function deleteTmpFile(){
		@unlink($_FILES['file']['tmp_name']);
	}
	
	function validateAppMessage(){
		
	}
	
	function dealApp(){
		move_uploaded_file($_FILES['file']['name'], $destination);
		
		$data=array();
		$data['app_name']=$_POST['app_name'];
		$data['app_version']=$_POST['app_version'];
		$data['app_size']=$_POST['app_size'];
		$data['app_address']='';
		$data['app_time']=data('Y-m-d');
		$data['app_source']=$_POST['app_source'];
		$data['app_pictures']='';
		$data['app_category']='';
		$data['app_description']=$_POST['app_description'];
		
		$this->appModel->insertApp($data);
	}
}
?>