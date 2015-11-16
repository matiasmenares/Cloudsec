<?php
	
 class AppAdd extends Controller {
	
		
	public function index() {
	
		$app = $this->load->model('App');

		if(!empty($this->request->post)){
			$save = $app->save($this->request->post);
		}
		
		$output['host'] = $app->getHost();
		$output['db'] = $app->getDb();
		$output['back'] = $app->getBack();
		$output['front'] = $app->getFront();
		$output['webserver'] = $app->getWeb();

		$this->render("app/add.php",$output);

	}
	
	public function save(){
		$app = $this->load->model('App');

		if(!empty($this->request->post)){
			$save = $app->save($this->request->post);
			if($save){
				$output['response'] = 'true';
			}else{
				$output['response'] = 'false';
			}
		}else{
				$output['response'] = 'error';
		}		
		echo json_encode($output);		
	}
	
}

?>