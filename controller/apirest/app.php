<?php
	
 class ApirestApp extends Controller {
	
		
	public function index() {
				
		$this->noHeader();	
			
		$this->response->addHeader('Content-Type: application/json');
		
		$this->response->setOutput("error no instance to Api");
	
		$this->render("api/api.php");
		
	}
	
	public function access(){
		
		$this->noHeader();	

		$this->response->addHeader('Content-Type: application/json');

		if(!empty($this->request->post)){
			
			$api = $this->load->model("Api");
			
			$auth = $api->authe($this->request->post['user'],$this->request->post['hash']);
			
			if($auth == true){
				
				$log = $this->load->model("Log");
				
				$save = $log->save($this->request->post);
				
				if($save == true){
					
					$json["response"] = "true";
					
					$this->response->setOutput(json_encode($json));
					
				}
				
				
			}else{
				
				$this->response->setOutput("Error Auth");
				
			}

		}else{
			
			$this->response->setOutput("Error No Request");

		}
		
		$this->render("api/api.php");
				
	}

}
?>