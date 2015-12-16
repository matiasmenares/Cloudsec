<?php
class ClassBlock extends Model {
	
	public function getBlock($data){
		$this->db->query("SELECT * from bloqueo
		INNER JOIN ip ON ip_id_ip = id_ip
		WHERE ip.ip = '".$this->db->escape($data['ip'])."'");
 		return $this->db->row();
	}

}
	
?>