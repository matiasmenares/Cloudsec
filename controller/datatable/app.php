<?php
	
 class DatatableApp extends Controller {		

	public function index() {
		
		$table = 'aplicacion';
		 
		$primaryKey = 'id_aplicacion';
		 
		$columns = array(
		    array( 'db' => 'id_aplicacion', 'dt' => 0 ),
			array( 'db' => 'nombre_aplicacion', 'dt' => 1 ),
			array( 'db' => 'ip_aplicacion',  'dt' => 2 ),
		);
		require( 'ssp/app.ssp.php' );
		echo json_encode(
		    SSP::simple( $this->request->post, $sql_details, $table, $primaryKey, $columns )
		);
	}
	
	public function access() {
		
		if(!empty($this->request->post)){
			$table = 'log_aplicacion';
			 
			$primaryKey = 'id_log_aplicacion';
			 
			$columns = array(
			    array( 'db' => 'id_log_aplicacion', 'dt' => 0 ),
				array( 'db' => 'fecha_log_aplicacion', 'dt' => 1 ),
				array( 'db' => 'ip', 'dt' => 2 ),
				array( 'db' => 'nombre_navegador', 'dt' => 3),
				array( 'db' => 'nombre_isp', 'dt' => 4 )
			);
			require( 'ssp/app_access.ssp.php' );
			echo json_encode(
			    SSP::simple($this->request->get['var1'],$this->request->post, $sql_details, $table, $primaryKey, $columns )
			);
		}
	}	
	
	public function bug() {
		
		if(!empty($this->request->post)){
			$table = 'vulnerabilidad';
			 
			$primaryKey = 'id_vulnerabilidad';
			 
			$columns = array(
			    array( 'db' => 'id_vulnerabilidad', 'dt' => 0 ),
				array( 'db' => 'nombre_vulnerabilidad', 'dt' => 1 ),
				array( 'db' => 'codigo_vulnerabilidad', 'dt' => 2 ),
				array( 'db' => 'gravedad_vulnerabilidad', 'dt' => 3),
				array( 'db' => 'fecha_vulnerabilidad', 'dt' => 4 )
			);
			require( 'ssp/bug.ssp.php' );
			echo json_encode(
			    SSP::simple(null,$this->request->post, $sql_details, $table, $primaryKey, $columns )
			);
		}
	}
	
	public function LogList() {
		
		if(!empty($this->request->post)){
			$table = 'log_sistema';
			 
			$primaryKey = 'id_log_sistema';
			 
			$columns = array(
			    array( 'db' => 'id_log_sistema', 'dt' => 0 ),
				array( 'db' => 'ip', 'dt' => 1 ),
				array( 'db' => 'nombre_navegador', 'dt' => 2 ),
				array( 'db' => 'nombre_ciudad', 'dt' => 3),
				array( 'db' => 'fecha_log_sistema', 'dt' => 4 )
			);
			require( 'ssp/log.ssp.php' );
			echo json_encode(
			    SSP::simple(null,$this->request->post, $sql_details, $table, $primaryKey, $columns )
			);
		}
	}
	
	public function Block() {
		
		if(!empty($this->request->post)){
			$table = 'bloqueo';
			 
			$primaryKey = 'id_bloqueo';
			 
			$columns = array(
			    array( 'db' => 'id_bloqueo', 'dt' => 0 ),
				array( 'db' => 'ip', 'dt' => 1 ),
				array( 'db' => 'fecha_inicio_bloqueo', 'dt' => 2 ),
			);
			require( 'ssp/block.ssp.php' );
			echo json_encode(
			    SSP::simple(null,$this->request->post, $sql_details, $table, $primaryKey, $columns )
			);
		}
	}						
	
}

?>