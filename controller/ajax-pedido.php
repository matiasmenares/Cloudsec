<?php
	
 class AjaxPedido extends Controller {
	
		
	public function index() {
		$pedido  = $this->load->model("Pedido");
		$producto  = $this->load->model("Producto");
		$output['buscar']=$pedido->verPedido($this->request->post['id_pedido']);
		$output['juego']=$producto->verProductoPedido($this->request->post['id_pedido']);
		
		$vista = TEMPLATE."ajax/pedido.php";
		
		$this->render($vista,$output);

	}
	
		
	
}

?>