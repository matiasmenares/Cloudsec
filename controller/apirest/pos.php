<?php
	
 class ApirestPos extends Controller {
	
		
	public function index() {
				
		$this->noHeader();	
			
		$this->response->addHeader('Content-Type: application/json');
		
		$this->response->setOutput("error no instance to Api");
	
		$this->render(TEMPLATE."api/api.php");
		
	}
	
	public function vender(){
		
		$this->noHeader();	

		$this->response->addHeader('Content-Type: application/json');

		if(!empty($this->request->post)){
			
			$api = $this->load->model("Api");
			
			$auth = $api->authe($this->request->post['user'],$this->request->post['hash']);
			
			if($auth == true){
				
				$producto = $this->load->model("Producto");
				
				$venta = $this->load->model("Venta");
				
				$producto = $producto->detalleProductoOc($this->request->post['product_id']);
				
				$id_compra = $venta->precioCompraProducto($producto['id_producto'],1);
				
				$editar_stock = $venta->descontarStockPrecioCompra($producto['id_producto'],$id_compra['id_producto_precio_compra'],$this->request->post['quantity'],$this->request->post['id_sucursal']);
				
				
				if($editar_stock == true){
					
					$json["response"] = "true";
					
					$this->response->setOutput(json_encode($json));
					
				}
				
				
			}else{
				
				$this->response->setOutput("Error Auth");
				
			}

		}else{
			
			$this->response->setOutput("Error No Request");

		}
		
		$this->render(TEMPLATE."api/api.php");
				
	}

}
?>