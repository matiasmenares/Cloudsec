<?php
class ClassApp extends Model {
	
	public function save($data){
		$this->db->query("INSERT INTO aplicacion (nombre_aplicacion, ip_aplicacion, url_aplicacion, carpeta_aplicacion, detalle_aplicacion, database_id_database, host_id_host, webserver_id_webserver, code_backend_id_code_backend, code_frontend_id_code_frontend) VALUES ('".$this->db->escape($data['nombre'])."', '".$this->db->escape($data['ip'])."', '".$this->db->escape($data['url'])."', '".$this->db->escape($data['ruta'])."', '".$this->db->escape($data['detalle'])."','".$this->db->escape($data['database'])."', '".$this->db->escape($data['host'])."', '".$this->db->escape($data['webserver'])."', '".$this->db->escape($data['back_end_lang'])."', '".$this->db->escape($data['front_end_lang'])."');");
		return $this->db->execute();
	}
	
	public function getApp($data){
		/*
			database is word protected on Mysql, you need use `database`
		*/
		$this->db->query("SELECT * FROM aplicacion
		INNER JOIN `database` ON aplicacion.database_id_database = `database`.id_database
		INNER JOIN host ON aplicacion.host_id_host = host.id_host
		INNER JOIN webserver ON aplicacion.webserver_id_webserver = webserver.id_webserver
		INNER JOIN code_frontend ON aplicacion.code_frontend_id_code_frontend = code_frontend.id_code_frontend
		INNER JOIN code_backend ON aplicacion.code_backend_id_code_backend = code_backend.id_code_backend
		WHERE id_aplicacion = '".(int) $data."';");
		return $this->db->row();
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
	
	public function getApps(){
		$this->db->query("SELECT * FROM aplicacion
		INNER JOIN host ON host_id_host = id_host
		;");
		return $this->db->rows();
	}

}
	
?>