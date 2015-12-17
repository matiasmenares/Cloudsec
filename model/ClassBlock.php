<?php
class ClassBlock extends Model {
	
	public function getBlock($data){
		$this->db->query("SELECT * from bloqueo
		INNER JOIN ip ON ip_id_ip = id_ip
		WHERE ip.ip = '".$this->db->escape($data['ip'])."'");
 		return $this->db->row();
	}
	
	public function block($data){
		$this->db->query("INSERT INTO bloqueo (ip_id_ip, fecha_inicio_bloqueo, fecha_termino_bloqueo, aplicacion_id_aplicacion) VALUES ('".$this->db->escape($data)."', NOW(), '2016-10-02', 1);");

 		return $this->db->execute();
	}

}
	
?>