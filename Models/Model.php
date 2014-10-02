<?php
// 模型主类，所有其他对数据进行操作的模型类都必须继承此类
class Model {
	const host = 'localhost';
	const user = 'root';
	const pass = '1901101444';
	const db = 'ncepuappdown';
	
	protected $dbc;
	protected $select = '*';
	protected $from = '';
	protected $where = '';
	protected $limit = 500;
	protected $offset = 0;
	
	function __construct($from) {
		$this->dbc = mysqli_connect ( self::host, self::user, self::pass, self::db );
	    mysqli_query($this->dbc, "set names 'utf8'");
		$this->setFrom($from);
	}
	
	// 设置SQL语句中各子句参数
	protected function setSelect($select) {
		$this->select = $select;
	}
	protected function setFrom($from) {
		$this->from = $from;
	}
	protected function setWhere($where = '') {
		$this->where = $where;
	}
	protected function setLimit($offset = 0, $limit = 500) {
		$this->limit = $limit;
		$this->offset = $offset;
	}
	
	// SQL SELECT相关语句
	protected function query() {
		if (! empty ( $this->where ))
			$query = "select $this->select from $this->from where $this->where limit $this->offset,$this->limit";
		else
			$query = "select $this->select from $this->from limit $this->offset,$this->limit";
		$result = mysqli_query ( $this->dbc, $query ) or die ( 'query fail' );
		$resultArray = array ();
		while ( $row = mysqli_fetch_array ( $result, MYSQL_ASSOC ) ) {
			array_push ( $resultArray, $row );
		}
		return $resultArray;
	}
	protected function get( $offset = 0, $limit = 500) {
		$this->setLimit ( $offset, $limit );
		return $this->query ();
	}
	protected function getWhereData($where, $offset = 0, $limit = 500) {
		$this->setWhere ( $where );
		$this->setLimit ( $offset, $limit );
		$this->query ();
	}
	
	// SQL INSERT相关语句
	protected function insert( $data) {
		$key_clause = '';
		$value_clause = '';
		foreach ( $data as $key => $value ) {
			$key_clause .= $key . ',';
			$value_clause .= "'$value',";
		}
		
		$key_clause = rtrim ( $key_clause, ',' );
		$value_clause = rtrim ( $value_clause, ',' );
		
		$query = "insert into $this->from ($key_clause)  values ($value_clause)";
		return mysqli_query ( $this->dbc, $query ) or die ( 'failed to insert' );
	}
	
	// SQL UPDATE相关语句
	protected function update( $data, $where) {
		$this->setWhere ( $where );
		$update = '';
		foreach ( $data as $key => $value ) {
			$update .= "$key='$value',";
		}
		rtrim ( $update, ',' );
		$query = "update $this->from set $update where $this->where";
		return mysqli_query ( $this->dbc, $query ) or die ( 'update fail' );
	}
	// SQL DELETE相关语句
	protected function delete( $where) {
		$this->setWhere ( $where );
		$query = "delete from $this->from where $this->where";
		return mysqli_query ( $this->dbc, $query ) or die ( 'delete fail' );
	}
	function __destruct() {
		mysqli_close ( $this->dbc );
	}
}
?>