<?php
//模型主类，所有其他对数据进行操作的模型类都必须继承此类

class Model{
	private final $host='localhost';
	private final $user='root';
	private final $pass='1901101444';
	private final $db='ncepuappdown';
	
	protected  $dbc;
	
	protected $select='*';
	protected $from='';
	protected $where='';
	protected $limit=500;
	protected $offset=0;
	
	function __construct(){
		$this->dbc=mysqli_connect($this->host,$this->user,$this->pass,$this->db);
	}
	
	//设置SQL语句中各子句参数
	protected function setSelect(String $select){
		$this->select=$select;
	}
	
	protected function setFrom(String $from){
		$this->from=$from;
	}
	
	protected function setWhere($where_array){
		$where='';
		foreach($where_array as $key => $value){
			$where.=$key.'='.$value.',';
		}
		$this->where=$where;
	}
	
	protected function setLimit($limit=100,$offset=0){
		$this->limit=$limit;
		$this->offset=$offset;
	}
	
	//SQL SELECT相关语句
	protected  function query(){
		$query="select $this->select from $this->from where $this->from limit $this->limit,$this->offset";
		$result=mysqli_query($this->dbc, $query) or die ('query fail');
		$resultArray=array();
		while ($row=mysqli_fetch_array($result, MYSQL_ASSOC )){
			array_push($resultArray, $row);
			return $resultArray;
		}
	}
	
	protected function get(String $from,$limit=100,$offset=0){
		$this->setFrom($from);
		$this->setLimit($limit,$offset);
		$this->query();
	}
	
	protected function getWhereData(String $table,$where_array,$limit=100,$offset=0){
		$this->setFrom($from);
		$this->setWhere($where_array);
		$this->setLimit($limit,$offset);
		$this->query();
	}
	
	//SQL INSERT相关语句
	protected function insert(String $from,$data){
		$this->setFrom($from);
		$key_clause='';
		$value_clause='';
		foreach ($data as $key => $value){
			$key_clause.=$key.',';
			$value_clause.=$value.',';
		}
		$query="insert into $this->from $key_clause  values $key_clause";
		mysqli_query($this->dbc, $query or die ('insert fail'));
	} 
	
	//SQL UPDATE相关语句
	protected function update(String $from,$data,$where_array){
		$this->setFrom($from);
		$this->setWhere($where_array);
		$update='';
		foreach ($data as $key => $value){
			$update.=$key.'='.$value.',';
		}
		$query="update $this->from set $update";
		mysqli_query($this->dbc, $query) or die('update fail');
	}
//SQL DELETE相关语句
	protected function delete(String $from,$where_array){
		$this->setFrom($from);
		$this->setWhere($where_array);
		$query="delete from $this->from where $this->where";
		mysqli_query($this->dbc, $query) or die ('delete fail');		
	}
	
	function __destruct(){
		mysqli_close($this->dbc);
	}
	
}
?>