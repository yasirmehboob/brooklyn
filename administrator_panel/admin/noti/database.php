<?php
class Database {
	const DB_HOST = 'localhost';
	const DB_USER = 'root';
	const DB_PASSWORD = '';
	const DB_NAME = 'cryst';
	private $_dbconnect = NULL;
	private $_table = 'noti';
	private $_adj = 4;
	private $_tpages = 0;
	private $_limit = 20;
	private $_offset= 0;
	private $_page = 1;
	private $_prev_lbl = '&lsaquo; Prev';
	private $_next_lbl = 'Next &rsaquo;';
	
	public function __construct() {
		$this->_dbconnect = mysql_connect(self::DB_HOST,self::DB_USER,self::DB_PASSWORD);
		if ($this->_dbconnect) {
			$db =  mysql_select_db(self::DB_NAME,$this->_dbconnect);
		} else {
			die(mysql_error());
		}
		$this->_page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$this->_offset = ($this->_page - 1) * $this->_limit;
	}
	
	private function total() {
		$result = mysql_query("select count(id) AS total FROM $this->_table");
		$row = mysql_fetch_array($result);
		return $row['total'];
	}
	
	public function get_users() {
		$query = mysql_query("SELECT * FROM $this->_table ORDER BY id DESC LIMIT $this->_offset,$this->_limit");
		$result = array();
		$i = 0;
		while($res = mysql_fetch_assoc($query)){
			$result[$i] = $res;
			$i++;
		}
		return $result;
	}
	
	public function delete($id){
		$ids = is_array($id) ? implode(',', $id) : $id;
		$query = mysql_query("DELETE FROM $this->_table WHERE id IN ($ids)");
		return $this->result($query);
	}
	public function insert($data) {
		$keys = implode(',', array_keys($data));
		$values = "'" . implode("','", array_values($data)) . "'";
		$query = mysql_query("INSERT INTO $this->_table ($keys) VALUES ($values)");
		return $this->result($query);
	}
	
	public function update($data) {
		$id = $data['id'];
		unset($data['id']);
		$query = "UPDATE $this->_table SET ";
		foreach ($data as $key => $value) {
			$params[] = $key." = '".$value."'";
		}
		$query .= implode(',', $params)." WHERE id = $id";
		return $this->result(mysql_query($query));
	}
	
	private function result($q) {
		return $q ? true : false;
	}
	
	public function paginate() {
		$this->_tpages = ceil($this->total()/$this->_limit);
		$out = '<div class="pagin green">';
		if($this->_page == 1) {
			$out .= "<span>$this->_prev_lbl</span>";
		} else {
			$out .= "<a href='javascript:void(0);' id='".($this->_page-1).")'>$this->_prev_lbl</a>";
		}
		$out.= ($this->_page>($this->_adj+1)) ? "<a href='javascript:void(0);' id='1'>1</a>" : '';
		$out.= ($this->_page>($this->_adj+2)) ? $out.= "...\n" : '';
		$pmin = ($this->_page>$this->_adj) ? ($this->_page-$this->_adj) : 1;
		$pmax = ($this->_page<($this->_tpages-$this->_adj)) ? ($this->_page+$this->_adj) : $this->_tpages;
		for($i=$pmin; $i<=$pmax; $i++) {
			if($i==$this->_page) {
				$out.= "<span class='current'>$i</span>";
			}else {
				$out.= "<a href='javascript:void(0);' id='$i'>$i</a>";
			}
		}
		$out. ($this->_page<($this->_tpages-$this->_adj-1)) ? $out.= "...\n" : '';
		$out.= ($this->_page<($this->_tpages-$this->_adj))? $out.= "<a href='javascript:void(0);' id='$this->_tpages'>$this->_tpages</a>" : '';
		if($this->_page<$this->_tpages) {
			$out.= "<a href='javascript:void(0);' id='".($this->_page+1)."'>$this->_next_lbl</a>";
		}else {
			$out.= "<span>$this->_next_lbl</span>";
		}
		$out.= "</div>";
		return $out;
	}
}
?>