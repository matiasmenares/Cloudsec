<?php
	
 class ApirestProducto extends Controller {
	
		
	public function index() {
				
		$this->noHeader();	
			
		$this->response->addHeader('Content-Type: application/json');
		
		$this->response->setOutput("error no instance to Api");
	
		$this->render(TEMPLATE."api/api.php");
		
	}
	
	
	public function agregar(){
		
		$this->noHeader();	

		$this->response->addHeader('Content-Type: application/json');

		if(!empty($this->request->post)){
			
			$api = $this->load->model("Api");
			
			$auth = $api->authe($this->request->post['user'],$this->request->post['hash']);
			
			if($auth == true){
				
				$producto = $this->load->model("Producto");
										
				$agregar = $producto->agregarProducto($this->request->post);
				
				$agregar_orden_inicio = $producto->agregarProductoPrecioCompraInicio(NULL,$agregar,1,$this->request->post['price_compra'],$this->request->post['quantity'],$this->system->hoyHora());	
				
				$agregar_precio = $producto->agregarPrecioVenta($agregar,0,$this->request->post['price'],$this->request->post['price'],0,0,0);
			
				$agregar_stock = $producto->agregarStockProducto($this->request->post['quantity'], 1, 1,$agregar);
			
				if($agregar == true){
					
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
	
	public function editarStock(){
		
		$this->noHeader();	

		$this->response->addHeader('Content-Type: application/json');

		if(!empty($this->request->post)){
			
			$api = $this->load->model("Api");
			
			$auth = $api->authe($this->request->post['user'],$this->request->post['hash']);
			
			if($auth == true){
				
				$producto = $this->load->model("Producto");
				
				$venta = $this->load->model("Venta");
				
				$producto = $producto->detalleProductoOc($this->request->post['product_id']);
				
				$id_compra = $venta->precioCompraProducto($producto['id_producto'],$this->request->post['id_sucursal']);
				
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
	
	public function verStock(){
		
		$this->noHeader();	
				
		$this->response->addHeader('Content-Type: application/json');

		if(!empty($this->request->post)){
						
			$api = $this->load->model("Api");
			
			$auth = $api->authe($this->request->post['user'],$this->request->post['hash']);
			
			if($auth == true){
				
				$producto = $this->load->model("Producto");
				
				$sucursal = $this->load->model("Sucursal");

				$sucursales = $sucursal->verSucursal();
				
								
				foreach($sucursales AS $clave => $valor){

					$json["producto"][] = $producto->verStockSucursal($this->request->post["product_id"],$valor['id_sucursal']);
					
				}	
					$this->response->setOutput(json_encode($json));
									
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