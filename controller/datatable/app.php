<?php
	
 class DatatableApp extends Controller {		

	public function index() {
		
		$table = 'aplicacion';
		 
		$primaryKey = 'id_aplicacion';
		 
		$columns = array(
		    array( 'db' => 'id_aplicacion', 'dt' => 0 ),
			array( 'db' => 'nombre_aplicacion', 'dt' => 1 ),
		    array( 'db' => 'lenguaje_aplicacion',   'dt' => 2 ),
			array( 'db' => 'ip_aplicacion',  'dt' => 3 ),
		);
		 
		require( 'ssp/app.ssp.php' );
		 
		echo json_encode(
		    SSP::simple( $this->request->post, $sql_details, $table, $primaryKey, $columns )
		);
	}		
	
}

?>