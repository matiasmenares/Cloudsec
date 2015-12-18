<?php
	
 class BlockList extends Controller {
	
		
	public function index() {
		if(isset($this->request->get['var1'])){
			$block = $this->load->model("Block");
			$block->deleteBlock($this->request->get['var1']);
			$this->system->notify(1,"Desbloqueado", "¡IP desbloqueada con éxito");
		}
		$this->render("block/list.php");
	}		
}

?>