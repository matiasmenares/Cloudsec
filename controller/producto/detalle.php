<?php
	
 class ProductoDetalle extends Controller {
	
		
	public function index() {
		
		$sucursal = $this->load->model("Sucursal");
		
		$oferta = $this->load->model("Oferta");
		
		$suc = $sucursal->verSucursal();
			
		if(!empty($this->request->post)){
			
			$id_producto = (int) $this->request->post['id_producto'];
			$producto  = $this->load->model("Producto");
			
			$precio_compra = 0;
			$precio_venta_minorista = str_replace(".", "",$this->request->post['precio_venta_minorista']);
			$precio_venta_mayorista = str_replace(".", "",$this->request->post['precio_venta_mayorista']);
			$precio_redcompra = str_replace(".", "",$this->request->post['precio_venta_redcompra']);
			$precio_lista1 = str_replace(".", "",$this->request->post['precio_venta_mayorista_lista1']);
			$precio_lista2 = str_replace(".", "",$this->request->post['precio_venta_mayorista_lista2']);
			$precio_lista3 = str_replace(".", "",$this->request->post['precio_venta_mayorista_lista3']);
			
			$id_opencart = $producto->verIdOpencart($id_producto);
							
			$stock_for_op = $this->request->post['stock_1'];

			//MODIFICAR PRODUCTO
			
			
			if(isset($this->request->post['habilitar_oc']))
			{
				$this->opencart->updateStatus($this->request->post['product_id_oc'],1);

				$status_oc=1;
			
			}
			else
			{
				$this->opencart->updateStatus($this->request->post['product_id_oc'],0);
				
				$status_oc=0;

			}

			/* Opencart */
			if((strlen($this->request->files['foto']['name'])>0) && ($this->request->post['foto_antigua'] != $this->request->files['foto']['name'])){
					$foto = $this->request->files['foto'];
				}
				else
				{
					$foto=$this->request->post['foto_antigua'];
				}
			if($id_opencart > 0 ){
								
				$this->opencart->modificarProductosWeb($this->request->post['nombre'],$this->request->post['product_id_oc'],$this->request->post['tag'], $this->request->post['model'],$this->request->post['length_class_id'],$this->request->post['length'],$this->request->post['width'],$this->request->post['height'],$this->request->post['weight'],$this->request->post['weight_class_id'],$this->request->post['categoriaweb'], $foto, $this->request->post['description'],$this->request->post['keyword'],$this->request->post['reserva']);
			
			}else{
							
				$precio_venta_web = $producto->verPrecios($id_producto);
				
				$id_opencart = $this->opencart->agregarCamposOpenCart($this->request->post['nombre'],$this->request->post['codigo'],$this->request->post['tag'],$this->request->post['model'],$this->request->post['keyword'],$this->request->post['length_class_id'],$this->request->post['length'],$this->request->post['width'],$this->request->post['height'],$this->request->post['weight'],$this->request->post['weight_class_id'],$this->request->post['categoriaweb'],$stock_for_op,$this->request->post['description'],$precio_venta_web[0]['precio_minorista_producto_precio_venta'],$foto,$status_oc);
				
				$this->opencart->updateStatus($id_opencart,$status_oc);

			}
			/* Opencart */

						
			$agregar = $producto->modificarProducto($id_producto, $this->request->post['codigo'],$this->request->post['nombre'],$precio_compra,$precio_venta_mayorista, $precio_venta_minorista,$this->request->post['descripcion_producto'],$this->request->files['foto'],$this->request->post['medida_producto'],$this->request->post['categoria'],$this->request->post['plataforma'],$this->request->post['reserva'],$id_opencart);
		
				
				if(!empty($this->request->post['cliente_oferta']) AND !empty($this->request->post['cantidad_oferta']) AND !empty($this->request->post['precio_oferta']) AND !empty($this->request->post['fecha_inicio_oferta']) AND !empty($this->request->post['fecha_termino_oferta']) ){
					
					// AGREGAR OFERTA A PRODUCTO
					
					for($x=0;$x<count($this->request->post['cliente_oferta']);$x++){
					
					$agregar_oferta = $oferta->agregar($id_producto,$this->request->post['fecha_inicio_oferta'][$x],$this->request->post['fecha_termino_oferta'][$x],$this->request->post['cantidad_oferta'][$x],$this->request->post['precio_oferta'][$x],$this->request->post['cliente_oferta'][$x]);
					
					}

				}
				
				if(!empty($this->request->post['precio_venta_minorista']) AND !empty($this->request->post['precio_venta_redcompra'])){
					
						$agregar_precio = $producto->agregarPrecioVenta($id_producto,0,$precio_venta_minorista,$precio_redcompra,0,0,0);
						
						$update_opencart = $this->opencart->editarPrecio($id_opencart,$precio_venta_minorista);
					
					if($agregar_precio){
						
						$setear_precio = $producto->setearPrecioVenta($id_producto,$agregar_precio);
						
					}
					
				}else{
					
					$agregar_precio = true;
				}
			
			if($agregar != false OR $agregar_precio != false){
				
				foreach($suc as $clave => $valor){
					
					//$agregar_stock= $producto->actualizarStockProducto($this->request->post['stock_'.$valor['id_sucursal']], $this->request->post['critico_'.$valor['id_sucursal']], $valor['id_sucursal'],$agregar);
					
					$actualizar_critico = $producto->actualizarStockCritico($this->request->post['critico_'.$valor['id_sucursal']], $valor['id_sucursal'],$id_producto);

				}
				
				//$this->system->redirect('stock-producto/mod/');
								
			}else{
				
				$this->system->notify(2,"Error", "¡Producto No Pudo Modificarse!");
				
			}
			
		}	
		
		if(isset($this->request->get['var1'])){
		
		$producto = $this->load->model("Producto");
		
		//$producto->actualizaRutas(); //SOLO USAR PARA ELIMINAR EL HASH EN LAS FOTOS
		
		$id_producto = (INT) $this->request->get['var1'];
		
		
		$output['producto'] = $producto->detalleProducto($id_producto);
		
			if($output['producto']>0){
				
				$output['categoria'] = $producto->categoriasProducto($id_producto);
				
				$proveedor = $this->load->model("Proveedor");
				
				$categoria = $this->load->model("Categoria");
					
				$plataforma = $this->load->model("Plataforma");

				$output['oferta'] = $oferta->verDetalle($id_producto);
		
				$output['plataforma'] = $plataforma->verPlataforma();
				
				$output['proveedor'] = $proveedor->verProveedor();
				
				$output['fila'] = $categoria->verCategoriaFamilia();
						
				foreach($suc AS $clave=>$valor){
					/* Stock por sucursales */
					$output['sucursal'][] = $producto->verStockSucursal($id_producto,$valor['id_sucursal']);
				
				}
				$output['precio'] = $producto->verPrecios($id_producto);
				
				$output['longitud'] = $this->opencart->mostrarLongitud();
				
				$output['peso'] = $this->opencart->mostrarPeso();

				$output['precio_actual'] = $producto->verPrecioActivado($id_producto);
				
				$output['precio_compra'] = $producto->verPrecioCompra($id_producto);
				
				if($output['producto']['product_id_oc'] > 0 AND $output['producto']['product_id_oc'] != NULL){
					$output['web'] = $this->opencart->mostrarTodo($output['producto']['product_id_oc']);
					$category = $this->opencart->getProductCategories($output['producto']['product_id_oc']);
					$output['seo'] = $this->opencart->mostrarSEO($output['producto']['product_id_oc']);
					if($category)
					{
						foreach($category as $clave => $valor){
							$output['category'][]=$this->opencart->getParentCategories($valor['category_id']);
						}
					}				
				}else{
					$output['seo'] = NULL;
					$output['web'] = NULL;
					$output['category'] = NULL;
				}

			}else{
				
				//SI NO EXISTE PRODUCTO (SQL FALSE) REDIRECCIONA A HOME
				
				$this->system->redirect("home/");
				
			}
			
		}else{
			
				//SI NO EXISTE POST  REDIRECCIONA A HOME

			$this->system->redirect("home/");

			
		}
		
				
		$vista = TEMPLATE."producto/detalle-producto.php";
		
		$this->render($vista,$output);

	}
	
		
	
}

?>