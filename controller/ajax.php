<?php
	
 class Ajax extends Controller {
	
		
	public function index() {
		

		
	}

	public function juegoCodigo() {
		
		$this->noHeader();	

		
		$producto = $this->load->model("Producto");
		
		$var = $this->request->post["query"];
		
		$lista = $producto->listarCodigoPlataformaStock($var);
		$lista_total = count($lista);
		
			for($x=0;$x<$lista_total;$x++){
				$stocks = $producto->verStockSucursalu($lista[$x]['id_producto']);
				$arreglo[] = array(
					'value'			=> $lista[$x]['codigo_producto']." - ".$lista[$x]['nombre_producto']." - ".$lista[$x]['descripcion_plataforma'],
					
					'disponible'  => $stocks,
					
					'datoId'  	    => $lista[$x]['id_producto'],
					
					'id_ecom'  	    => $lista[$x]['product_id_oc']
				);
			}
		echo '{ "query": "Unit", "suggestions": '.json_encode($arreglo)." } ";

	}
	
	public function menu(){
		
		
		$menu = $this->request->post['menu'];
		
		$_SESSION['menu_side'] = $menu;
		
		echo $_SESSION['menu_side'];
		
		
	}
	
	public function buscar() {
		
		$this->noHeader();	

		if($this->request->post){
			
			$buscador  = $this->load->model("Buscador");
			
			$termino=$this->request->post['buscar'];
			//$esFrase=explode(" ", $termino);
			$buscar=$buscador->busquedaPalabra($termino);
			
			
		}

		
		$output['buscar']=$buscar;

		$vista = TEMPLATE."ajax/busqueda.php";
		
		$this->render($vista,$output);


	}
	public function ordenCompra() {
	
		$this->noHeader();	

		$orden  = $this->load->model("Orden");
		$producto  = $this->load->model("Producto");
		$output['buscar']=$orden->verOrden($this->request->post['id_orden']);
		$output['juego']=$producto->verProductoOrden($this->request->post['id_orden']);
		$vista = TEMPLATE."ajax/orden.php";
		$this->render($vista,$output);

	}
	public function editarStock() {
		
		$this->noHeader();	

		$stock=str_replace(".", "", $this->request->post['stock_producto_precio_compra']);
		$stock_antiguo=str_replace(".", "", $this->request->post['stock_producto_precio_compra_antiguo']);
		$calculo=$stock-$stock_antiguo;
		$operador="+";
		if($calculo<0){
			$operador="-";
		}
		$calculo=abs($calculo);
		
		/* 
			PARA ENVIAR A E-COMMERCE 
		*/
		
		$this->opencart->editarStock($this->request->post['product_id_oc'], $calculo, $operador);
	
		$fecha=date('Y-m-d', strtotime($this->request->post['fecha_producto_precio_compra']));
		$precio=str_replace(".", "", $this->request->post['precio_producto_precio_compra']);
		$producto  = $this->load->model("Producto");
		
		$res= $producto->editarStock($this->request->post['id_producto_precio_compra'],$this->request->post['stock_inicial_producto_precio_compra'], $stock, $precio, $fecha);
		echo json_encode($res);

	}
	
	public function categoriasOp() {
		
		$this->noHeader();	

		$json = array();

		if (isset($this->request->post['query'])) {

			$filter_data = array(
				'filter_name' => $this->request->post['query'],
				'sort'        => 'name',
				'order'       => 'ASC',
				'start'       => 0,
				'limit'       => 10
			);

			$results = $this->opencart->getCategories($filter_data);

		if($results!=null){
				foreach ($results as $result) {
					$json[] = array(
						'data' => $result['category_id'],
						'value' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
					);
				}
			}
		}

		$sort_order = array();
/*
		foreach ($json as $key => $valor) {
			$sort_order[$key] = $valor['name'];
		}

		array_multisort($sort_order, SORT_ASC, $json);
*/
		//$this->response->addHeader('Content-Type: application/json');
		//$this->response->setOutput(json_encode($json));
	 	echo '{ "query": "Unit", "suggestions": '.json_encode($json)."}";
	}
		
	
}

?>