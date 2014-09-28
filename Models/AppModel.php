<?php
require_once 'Model.php';
class AppModel extends Model {
		function __construct(){
			parent::__construct();
		}
		
		function insertApp($data){
			$this->insert('app', $data);	
		}
		
		function __destruct(){
			parent::__destruct();
		}
}
?>