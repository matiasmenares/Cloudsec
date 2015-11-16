<?php
class ClassApp extends Model {
	
	public function save(){
	//	$this->db->query("");
	}
	
	public function getHost(){
		$this->db->query("SELECT * FROM host;");
		return $this->db->rows();
	}
	
	public function getDb(){
		$this->db->query("SELECT * FROM `database`;");
		return $this->db->rows();
	}
	
	public function getFront(){
		$this->db->query("SELECT * FROM code_frontend;");
		return $this->db->rows();
	}
	
	public function getBack(){
		$this->db->query("SELECT * FROM code_backend;");
		return $this->db->rows();
	}
	
	public function getWeb(){
		$this->db->query("SELECT * FROM webserver;");
		return $this->db->rows();
	}

}
	
?>