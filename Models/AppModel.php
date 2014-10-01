<?php
require_once 'Model.php';
class AppModel extends Model {
		function __construct(){
			parent::__construct('app');
		}
		
		function insertApp($data){
			$this->insert( $data);	
		}
		
		function getApp($select,$where){
			$this->setSelect($select);
			$this->setWhere($where);
			return $this->get();
		}
		
		function __destruct(){
			parent::__destruct();
		}
}
?>