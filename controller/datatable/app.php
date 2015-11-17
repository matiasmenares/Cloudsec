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
				array( 'db' => 'fecha_log_aplicacion', 'dt' => 1 )
			);
			 
			require( 'ssp/app_access.ssp.php' );
			 
			echo json_encode(
			    SSP::simple( $this->request->post, $sql_details, $table, $primaryKey, $columns )
			);
		}
	}				
	
}

?>