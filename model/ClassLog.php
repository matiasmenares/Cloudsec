<?php
class ClassLog extends Model {
	
	public function save($data){
		$this->db->query("INSERT INTO log_sistema (navegador_id_navegador, ciudad_id_ciudad, ip_id_ip, fecha_log_sistema, aplicacion_id_aplicacion) VALUES ( '".$this->db->escape($data['navegador'])."', '".$this->db->escape($data['ciudad'])."', '".$this->db->escape($data['ip'])."', NOW(), 1);");
		return $this->db->execute();
	}
	
	public function getLog($id){
		$this->db->query("SELECT * FROM log_sistema 
		INNER JOIN navegador ON navegador_id_navegador = id_navegador
		INNER JOIN ciudad ON ciudad_id_ciudad = id_ciudad
		INNER JOIN ip ON ip_id_ip = id_ip
		WHERE id_log_sistema='".$this->db->escape($id)."'");
		
		return $this->db->row();
	}

}
	
?>