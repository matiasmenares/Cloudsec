<?php
	
 class Home extends Controller {		

	public function index() {

		$app = $this->load->model('App');
		
		$output['app'] = $app->getApps();
		
		$this->render("home.php",$output);

	}			
	
}

?>