<?php
	
Class BugDetail extends Controller {		

	public function index() {
		
		$bug = $this->load->model("Bug");
		
		$output['bug'] = $bug->getBug($this->request->get['var1']);
		
		$this->render("bug/detail.php",$output);

	}			
	
}

?>