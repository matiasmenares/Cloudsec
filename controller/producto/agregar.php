<?php
	
 class ProductoAgregar extends Controller {
	
		
	public function index() {

		$vista = TEMPLATE."producto/agregar-producto.php";
	
		$proveedor = $this->load->model("Proveedor");
		
		$categoria = $this->load->model("Categoria");
			
		$sucursal = $this->load->model("Sucursal");
		
		$plataforma = $this->load->model("Plataforma");
		
		$impuesto = $this->load->model("Impuesto");
		
		$output['plataforma'] = $plataforma->verPlataforma();
		
		$output['proveedor'] = $proveedor->verProveedor();
		
		$output['fila'] = $categoria->verCategoriaFamilia();

		$output['sucursal'] = $sucursal->verSucursal();

		$output['impuesto'] = $impuesto->verImpuesto();
		
		$output['longitud'] = $this->opencart->mostrarLongitud();
		
		$output['peso'] = $this->opencart->mostrarPeso();
		if(!empty($this->request->post)){

			$producto  = $this->load->model("Producto");
			
			$precio_compra = 0;
			$precio_venta_minorista = str_replace(".", "",$this->request->post['precio_venta_minorista']);
			$precio_venta_mayorista = null;
			$precio_redcompra = str_replace(".", "",$this->request->post['precio_venta_redcompra']);
			$precio_lista1 = null;
			$precio_lista2 = null;
			$precio_lista3 = null;
			

			/* OPENCART */
			
			if(isset($this->request->post['habilitar_oc'])){
				$status_oc=1;
			}else{
				$status_oc=0;
			}
			
			$stock=$this->request->post['stock_1'];
			
			$precio_venta_web=$precio_venta_minorista;
			
			foreach($output['sucursal'] as $clave => $valor){
					$stock_total = $stock_total+$this->request->post['stock_'.$valor['id_sucursal']];
			}
			
			
			$codigoFoto= $producto->verUltimoIdProducto();
			$codigoFoto=$codigoFoto+1;
			$foto=$this->request->files['foto'];
			$imagen = $this->upload($foto,4000,DIR_UPLOAD_OPENCART, $codigoFoto);

			
			$data = $this->request->post;
			$data['id_opencart'] = $id_opencart;
			$data['image'] = $imagen;
			$data['precio'] = $precio_venta_minorista;
			$data['stock_total'] = $stock_total;
			$op = json_decode($this->opencart->agregarProducto($data));
			$data['id_opencart'] = $op->response;
			
			$agregar = $producto->agregarProducto($data);
			//$fotoProducto=$producto->verFotoProducto($agregar);

		 //$id_opencart = $this->opencart->agregarCamposOpenCart($this->request->post['nombre'],$this->request->post['codigo'],$this->request->post['tag'],$this->request->post['modelo'],$this->request->post['keyword'],$this->request->post['title'],$this->request->post['length'],$this->request->post['width'],$this->request->post['height'],$this->request->post['weight'],$this->request->post['weight_class_id'],$this->request->post['categoriaweb'],$stock,$this->request->post['descripcion_web'],$precio_venta_web,$fotoProducto,$status_oc,$this->request->post['reserva']);
			
			/* FIN OPENCART */
			
			if($agregar != false){
				foreach($output['sucursal'] as $clave => $valor){
					
					$agregar_stock = $producto->agregarStockProducto($this->request->post['stock_'.$valor['id_sucursal']], $this->request->post['critico_'.$valor['id_sucursal']], $valor['id_sucursal'],$agregar);
					
				}
				
				$agregar_precio = $producto->agregarPrecioVenta($agregar,$precio_venta_mayorista,$precio_venta_minorista,$precio_redcompra,$precio_lista1,$precio_lista2,$precio_lista3);
				
// 			--	ORDEN COMPRA INICAL --
				$nombre_pedido = "Orden Inicial Producto ID: ".$agregar;
				$fecha = $this->system->hoy();
				$direccion_pedido = NULL;
				$id_proveedor =1;
				$retira_usuario = $_SESSION['id_usuario'];
				$descripcion_pedido = NULL;
				$id_producto = $agregar;
				$stock_pedido = 0;
				foreach($output['sucursal'] as $clave => $valor)
				{
					$stock_pedido = $stock_pedido + $this->request->post['stock_'.$valor['id_sucursal']];
				}
				$precio_orden = $this->request->post['precio_compra'];
				$comentario = "Producto ID: ".$agregar." agregado al sistema";
				$id_estado = 4; // 4: distribuido.
				
				$id_orden = $producto->agregarOrdenInicio($nombre_pedido,$fecha,$fecha,$direccion_pedido,$id_proveedor,$retira_usuario,$descripcion_pedido,$comentario);
				
				$producto->agregarProductoOrdenInicio($id_orden,$id_producto,$stock_pedido,$precio_orden);
				
				foreach($output['sucursal'] as $clave => $valor)
				{
					$producto->agregarProductoPrecioCompraInicio($id_orden,$id_producto,$valor['id_sucursal'],$precio_orden,$this->request->post['stock_'.$valor['id_sucursal']],$fecha);
				}

				$producto->estadoOrdenCompraInicio($id_orden,$id_estado,$comentario,$fecha);
				
				$this->system->notify(1,"Agregado", "¡Producto Agregado Con Éxito!");
				
			}else{
				
				$this->system->notify(2,"Error", "¡Producto No Pudo Agregarse!");
				
			}
				
		}	
		
		
		$this->render($vista,$output);

	}
	
}

?>