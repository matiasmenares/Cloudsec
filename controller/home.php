<?php
	
 class Home extends Controller {
	
		

	public function index() {

		$sucursal = $this->load->model("Sucursal");
		
		$pedido = $this->load->model("Pedido");
		
		$producto = $this->load->model("Producto");
		
		$sucursales = $sucursal->verSucursal();
		
		
		$this->css->setCss();
		
		/*
		$this->session->data['hola'] = "hola";
		echo $this->session->data['hola'];
		*/
		
		$color= array('red-thunderbird', 'green', 'blue');
			
			// foreach para ver los pedidos pendientes
			
			foreach($sucursales as $clave => $valor)
			{
				$total_pendiente  = $pedido->pedidosPendientesSucursal(1,$valor['id_sucursal']);
				if($total_pendiente == false){
					
					$output["total_pendiente_sucursal"][$valor['id_sucursal']] = 0;
					$output['nombre_sucursal'][$valor['id_sucursal']] = $valor['nombre_sucursal'];
					
					
				}else{
					
				$output["total_pendiente_sucursal"][$valor['id_sucursal']] = count($pedido->pedidosPendientesSucursal(1,$valor['id_sucursal']));
				$output["nombre_sucursal"][$valor['id_sucursal']]= $valor['nombre_sucursal'];

				}
				$output['color'][$valor['id_sucursal']] = $color[$valor['id_sucursal']-1];
			}
			
			foreach($sucursales as $clave => $valor){
				
				$stock_critico  = $producto->verStockCriticoSucursales($valor['id_sucursal']);
				if($stock_critico == false){
					
					$output["stock_critico_sucursal"][$valor['id_sucursal']] = 0;
					$output['nombre_sucursal'][$valor['id_sucursal']] = $valor['nombre_sucursal'];
					
					
				}else{
					
				$output["stock_critico_sucursal"][$valor['id_sucursal']] = count($producto->verStockCriticoSucursales($valor['id_sucursal']));
				$output["nombre_sucursal"][$valor['id_sucursal']]= $valor['nombre_sucursal'];

				}
				$output['color'][$valor['id_sucursal']] = $color[$valor['id_sucursal']-1];
			}
			
			//fin foreach pedidos pendientes
			
			//FOREACH STOCK CRITICO DE LAS SUCURSALES
			
			foreach($sucursales as $clave => $valor){
				
				$stock_critico  = $producto->verStockCriticoSucursales($valor['id_sucursal']);
				if($stock_critico == false){
					
					$output["stock_critico_sucursal"][$valor['id_sucursal']] = 0;
					$output['nombre_sucursal'][$valor['id_sucursal']] = $valor['nombre_sucursal'];
					
					
				}else{
					
				$output["stock_critico_sucursal"][$valor['id_sucursal']] = count($producto->verStockCriticoSucursales($valor['id_sucursal']));
				$output["nombre_sucursal"][$valor['id_sucursal']]= $valor['nombre_sucursal'];


				}

				$output['color'][$valor['id_sucursal']] = $color[$valor['id_sucursal']-1];
			}
			
			//FIN DE STOCK CRITICO DE LAS SUCURSALES
			
			
			//FOREACH STOCK CERO DE LAS SUCURSALES
			
			
			foreach($sucursales as $clave => $valor)
			{
				$stock_cero = $producto->productosStockCeroSucursales($valor['id_sucursal']);
				if($stock_cero == false){
					
					$output["stock_cero_sucursal"][$valor['id_sucursal']] = 0;
					$output['nombre_sucursal'][$valor['id_sucursal']] = $valor['nombre_sucursal'];
					
					
				}else{
					
				$output["stock_cero_sucursal"][$valor['id_sucursal']] = count($producto->productosStockCeroSucursales($valor['id_sucursal']));
				$output["nombre_sucursal"][$valor['id_sucursal']]= $valor['nombre_sucursal'];

				}
				
				$stock_cero_sucursal = $output["stock_cero_sucursal"][$valor['id_sucursal']];
				
				$stock_total_sucursal = $producto->totalProductoSucursal($valor['id_sucursal']);

				$output["total_stock_sucursal"][$valor['id_sucursal']] = $stock_total_sucursal['total']-$stock_cero_sucursal;

				$output['color'][$valor['id_sucursal']] = $color[$valor['id_sucursal']-1];
			}
			
			
			//FIN DE STOCK CERO DE LAS SUCURSALES
			
			


		$vista = TEMPLATE."home.php";//RUTA DE LA VISTA
	
		$this->render($vista,$output);

	}

		
		
	
}

?>