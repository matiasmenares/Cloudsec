<?php
  
class ClassUsuario extends Model {  
	
 
     public function login ($user,$pass){
	     
	 	  
	     $session_colum = array(
	     0	=> "id_usuario",
	     1  => "nombre_usuario",
	     2	=> "apellido_usuario",
	     3	=> "mail",
	     4  => "foto_usuario",
	     5  => "perfil_id_perfil",
			 6 	=> "sucursal_id_sucursal",	 
	     );
	     
	    $auth = $this->auth($user,$pass,'usuario','mail_usuario','pass_usuario','ver_usuario',1,'sha1',2,$session_colum);
	     
		 
		return $auth;

	}    
  
	public function desconectar(){
		  
		$this->session->destroyAll();
		  	
    	exit('<meta http-equiv="Refresh" content="0;url=login/">');

	}
	public function verUsuarioTotal(){
		$sql = $this->db->query("SELECT * FROM usuario where id_usuario <> {$_SESSION['id_usuario']}");
		
	  	$exec = $this->db->rows();
	  	
	  	return $exec;
	}
	
	public function verUsuario(){
		$sql = $this->db->query("SELECT * FROM usuario");
		
	  	$exec = $this->db->rows();
	  	
	  	return $exec;
	}
	
	public function verSucursalUsuario(){
			
		$sql = $this->db->query("SELECT * FROM sucursal s
								INNER JOIN usuario u on u.sucursal_id_sucursal = s.id_sucursal
								WHERE id_usuario <> {$_SESSION['id_usuario']}								
								AND s.ver_sucursal = '1' 
								group by s.nombre_sucursal");

		$exec =	$this->db->rows();	

	return $exec;
		
	}
  
      
}      
?>