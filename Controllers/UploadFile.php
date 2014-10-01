<?php
require_once 'Models/AppModel.php';
require_once 'HTTP/Upload.php';
require_once 'Controller.php';
class UploadFile extends Controller{
	private $appModel;
	private $upload;
	private $file;
	function __construct(){
		parent::__construct();
		$this->appModel=new AppModel();
		$this->upload=new HTTP_Upload();
	}
	
	function displayUploadView(){
		$this->display('uploadfileview.html');	
	}
	
	function uploadFile(){
		$this->file=$this->upload->getFiles('file');
		$this->validateApp();
	}
	
	function scanPackageMessage(){
	}
	
	function deleteTmpFile(){
			@unlink($this->upload->getProp('tmp_name'));
	}
	
	function validateApp(){
		if ($this->file->isValid()){
			if (($this->file->getProp('ext') =='apk' )&&($this->file->getProp('type')=='application/vnd.android.package-archive')){
				$this->dealApp();
			}	else{
				echo 'error type!';
				$this->deleteTmpFile();
			}	
		}else{
			echo $file->errorMsg();
		}
	}
	
	function dealApp(){
		$filePath=$this->getFolder();
		$this->file->moveTo($filePath);
		
		$data=array();
		$data['app_name']=$_POST['app_name'];
		$data['app_package']=$this->file->getProp('name');
		$data['app_version']=$_POST['app_version'];
		$data['app_size']=($this->file->getProp('size'))/(1024*1024);
		$data['app_address']=$filePath.'/'.$this->file->getProp('name');
		$data['app_time']=date('Y-m-d');
		$data['app_source']=$_POST['app_source'];
		$data['app_pictures']='pictures';
		$data['app_category']='1';
		$data['app_description']=$_POST['app_description'];
		
		$this->appModel->insertApp($data);
	}
	
	function getFolder(){
		$basedir='/home/jiong/workspace/ncepu_app_down/Resources/file';
		$year=date('Y');
		$month=date('m');
		$day=date('d');
		
		if (!is_dir("$basedir/$year")){
			mkdir("$basedir/$year");
		}
		
		if (!is_dir("$basedir/$year/$month")){
			mkdir("$basedir/$year/$month");
		}
		
		if (!is_dir("$basedir/$year/$month/$day")){
			mkdir("$basedir/$year/$month/$day");
		}
		return "$basedir/$year/$month/$day";
	}
}
?>