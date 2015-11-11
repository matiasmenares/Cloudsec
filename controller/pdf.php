<?php
	
 class Pdf extends Controller {
	
		
	public function index(){
				
	}
	
	public function pedido(){
		
		 $id_pedido = (int)$this->request->get['var1'];	
		 
		 $pedido = $this->load->model("Pedido");

			$output['pedido'] = $pedido->verPedido($id_pedido);
						
			$output['producto'] = $pedido->verProductos($id_pedido);

			$output['estado'] = $pedido->verUltimoEstado($id_pedido);
			
			$output['envio'] = $pedido->verPedidoEnvio($id_pedido);

			$output['total_productos'] = count($output['producto']);

			$vista = TEMPLATE."pdf/detalle-pedido.php";
	
		$this->render($vista,$output);

	}
	
	
}

?>