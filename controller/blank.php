<?php
	
 class Blank extends Controller {
	
		
	public function index() {
		
		$blank = $this->load->model("Blank");
		$output['dato'] = null;
		$output['dato2'] = null;
		$vista = TEMPLATE."blank/{$_SESSION['menu']}.php";
		$this->render($vista,$output);

	}
	
		
	
}

?>