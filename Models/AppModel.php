<?php
require_once 'Model.php';
class AppModel extends Model {
		function __construct(){
			parent::__construct('app');
		}
		
		function insertApp($data){
			$this->insert( $data);	
		}
		
		function getApp($select,$where='', $offset = 0, $limit = 500){
			$this->setLimit( $offset ,$limit);
			$this->setSelect($select);
			$this->setWhere($where);
			return $this->get();
		}
		
		function __destruct(){
			parent::__destruct();
		}
}
?>