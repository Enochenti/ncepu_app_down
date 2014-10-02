<?php 
require_once 'Controller.php';
require_once 'Models/AppModel.php';
class DownloadFile extends Controller{
	private $appModel;
	
	function __construct(){
		parent::__construct();
		$this->appModel=new AppModel();
	}
	
	function displayDownloadView(){
		$data=$this->appModel->getApp('app_id,app_name', '');
		$this->assign('data', $data);
		$this->display('downloadview.html');
	}
	
	function getAjax($id){
		$data=$this->appModel->getApp('app_id,app_name,app_description',"app_id=$id");
		$result=array();
		if (empty($data)){
			$result['status']='fail';
		}else{
			foreach ($data as $value){
				$result['status']='success';
				$result['id']=$value['app_id'];
				$result['name']=$value['app_name'];
				$result['description']=$value['app_description'];
			}
		}
		echo json_encode($result);
	}
	
	function download($app_id){
		$data=$this->appModel->getApp('app_package,app_address',"app_id=$app_id" );
		foreach ($data as $aData){
			$fileName=$aData['app_package'];
			$file=$aData['app_address'];
		if (!file_exists($file)){
				echo 'file not found!';
				exit();
		}else{
				$fh=fopen($file, 'r');
				header('Content-type: application/octet-stream');
				header('Accept-Ranges: bytes');
				header('Accept-Length: '.filesize($file));
				header('Content-Disposition: attachment; filename='.$fileName);
				
				echo fread($fh, filesize($file));
				fclose($fh);
			}
		}
	}
}
?>