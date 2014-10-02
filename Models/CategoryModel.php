<?php 
require_once 'Models/Model.php';
class CategoryModel extends Model{
	function __construct(){
		parent::__construct('category');
	}
	
	function getCategory($select,$where=''){
		$this->setSelect($select);
		$this->setWhere($where);
		return $this->get();
	}
	
	function deleteCategory($where=''){
		$this->delete($where);
	}
	
	function insertCategory($data){
		$this->insert($data);
	}
	
	function updateCategory($data,$where=''){
		$this->update($data, $where);
	}
	
}
?>