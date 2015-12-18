<?php
	
 class LogDetail extends Controller {
	
		
	public function index() {
		
		if($this->request->get['var1']){
		
			$log = $this->load->model("Log");
			
			$output['detail'] = $log->getLog($this->request->get['var1']);
			
			if(isset($this->request->post['bloquear'])){
			
			$bloqueo = $this->load->model("Block");
			
			$bloqueo->block(1);
			
			$this->system->notify(2,"Bloqueado", "¡IP Bloqueada!");


			}

			$this->render("log/detail.php",$output);
		}else{
			$this->system->redirect("home/");
		}
	}
	
		
	
}

?>