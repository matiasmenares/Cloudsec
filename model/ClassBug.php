<?php
class ClassBug extends Model {
	
	public function getBug($id){
		$this->db->query("SELECT * from vulnerabilidad
		WHERE id_vulnerabilidad = '".$this->db->escape($id)."'");
		return $this->db->row();
	}

}
	
?>