<?php
	
 class error404 extends Controller {
	
		

	public function index() {
		
		if(DEBUG == 'TRUE'){
			
			$output['error'] = $this->session->data["error_debug"];	
		
		}else{
			$output = null;
		}	
		
		$this->render(TEMPLATE."error/404.php",$output);

	}

		
		
	
}

?>