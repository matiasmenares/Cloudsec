<?php
	
 class Home extends Controller {		

	public function index() {


		$vista = TEMPLATE."home.php";//RUTA DE LA VISTA
	
		$this->render($vista,null);

	}			
	
}

?>