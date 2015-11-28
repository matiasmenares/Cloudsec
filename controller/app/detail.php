<?php
	
 class AppDetail extends Controller {
	
		
	public function index() {
		
		if($this->request->get['var1']){
		
			$App = $this->load->model("App");
			
			$output['detail'] = $App->getApp($this->request->get['var1']);
						
		$this->render("app/detail.php",$output);
		}else{
			$this->system->redirect("home/");
		}
	}
	
		
	
}

?>