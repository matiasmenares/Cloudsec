<?php
	
class classApi extends Model { 
	
	public function authe($user,$hash){
		
		$sql = $this->db->query("SELECT * FROM api WHERE user_api LIKE '".$this->db->escape($user)."' AND hash_api LIKE '".$this->db->escape($hash)."';");

		if($this->db->numRows()>0){
			
			return true;
		
		}else{
			
			return false;
			
		}
	}
	
	public function test($user,$hash){
		
		$sql = $this->db->query("INSERT INTO api (user_api,hash_api) values('".$this->db->escape($user)."','".$this->db->escape($hash)."');");

		$this->db->execute();
			
	}
}
	
?>