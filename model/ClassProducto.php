<?php
class ClassProducto extends Model { 
	
	
	public function agregarProducto($data){ 
		//if($imagen!='default.jpg'){
			//$this->system->resize($imagen,200,200,DIR_UPLOAD."img_product/",DIR_UPLOAD."img_product/".DIR_FOTOS_BAJAS);
		//}
		
		$data['id_opencart'] = $this->isNull($data['id_opencart']);
		
		$sql = $this->db->query("INSERT INTO producto (codigo_producto, nombre_producto, detalle_producto, imagen_producto, medida_id_medida ,plataforma_id_plataforma,reserva_producto,product_id_oc) VALUES ('".$this->db->escape($data['codigo'])."', '".$this->db->escape($data['nombre'])."',  '".$this->db->escape($data['descripcion_producto'])."','{$data['image']}','{$data['medida_producto']}','{$data['plataforma']}','{$data['reserva']}',{$data['id_opencart']});");

		$exec = $this->db->execute();
				
		if($exec==true)
		{
			$id = $this->db->ultimoId();						
			
			$total_categorias = count($data['categoria']);
						
			for($x=0;$x<$total_categorias;$x++){
			
				$this->agregarCategoriaProducto($data['categoria'][$x],$id);
				
			}
			
			return $id;
		}
		else
		{
			return false;
		}
	
	}

// Crea una orden de compra al agregar un producto nuevo.	
	public function agregarOrdenInicio($nombre_pedido,$fecha_pedido,$fecha_tentativa_pedido,$direccion_pedido,$id_proveedor,$retira_usuario,$descripcion_pedido,$comentario)		{
		$sql = $this->db->query("INSERT INTO orden_compra (nombre_orden_compra, fecha_orden_compra, fecha_tentativa_llegada_orden_compra, direccion_orden_compra, descripcion_orden_compra, proveedor_id_proveedor, retira_usuario_id_usuario, responsable_usuario_id_usuario) VALUES  ('{$nombre_pedido}', '{$fecha_pedido}', '{$fecha_tentativa_pedido}', '{$direccion_pedido}', '{$descripcion_pedido}', '{$id_proveedor}', '{$retira_usuario}', '{$_SESSION['id_usuario']}');");
		
		$exec = $this->db->execute();
		if($exec==true)
		{
			$id = $this->db->ultimoId();
												
			return $id;
		}
		else{
			
			return false;
		}
	}
//
// 
	public function agregarProductoOrdenInicio($id_pedido,$id_producto,$stock_pedido,$precio){
		
		$stock_pedido = $this->isNull($stock_pedido);

		$sql = $this->db->query("INSERT INTO orden_compra_producto (orden_compra_id_orden_compra, producto_id_producto, stock_orden_compra_producto, precio_orden_compra_producto) VALUES ('{$id_pedido}', '{$id_producto}', {$stock_pedido}, {$precio});");
		
		$exec = $this->db->execute();
		
		return $exec;

	}
//
// 	agrega estado de una orden de compra al log de cambios de estado (agregar-producto)
	public function estadoOrdenCompraInicio($id_orden_compra,$id_estado,$comentario,$fecha){
		$sql = $this->db->query("INSERT INTO orden_compra_estado_orden_compra(orden_compra_id_orden_compra, estado_orden_compra_id_estado_orden_compra, usuario_id_usuario, comentario_orden_compra_estado_orden_compra, fecha_orden_compra_estado_orden_compra) VALUES ({$id_orden_compra},{$id_estado},".$_SESSION['id_usuario'].",'{$comentario}','{$fecha}');");
			//rows, row, execute.
			$exec = $this->db->execute();
			return $exec;	
	}
//
//
	public function agregarProductoPrecioCompraInicio($id_orden,$id_producto,$id_sucursal,$precio,$stock_pedido,$fecha_ingreso){
		
		$stock_pedido = $this->isNull($stock_pedido);
		
		$id_orden = $this->isNull($id_orden);


		$sql = $this->db->query("INSERT INTO producto_precio_compra(precio_producto_precio_compra, stock_producto_precio_compra, stock_inicial_producto_precio_compra, fecha_producto_precio_compra, producto_id_producto, sucursal_id_sucursal, orden_compra_id_orden_compra) VALUES ({$precio},{$stock_pedido},{$stock_pedido},'{$fecha_ingreso}',{$id_producto},{$id_sucursal},{$id_orden});");
		
		$exec = $this->db->execute();
		
		return $exec;
	}
//
//
	function eliminarProducto($id_producto){
		$sql = $this->db->query("UPDATE producto SET ver_producto = 0 WHERE id_producto = '{$id_producto};'");
		
		$exec = $this->db->execute();
		
		if($exec==true)
		{
			return $id_producto;
		}else{
			return false;
		}
	}
//
//
	public function modificarProducto($id_producto, $codigo,$nombre,$preciocosto,$precioventamayorista, $precioventaminorista,$detalle,$imagen,$medida,$categoria,$plataforma,$reserva,$id_opencart){
		
		$detalleP = $this->detalleProducto($id_producto);
			if((strlen($imagen['name'])>0) && ($detalleP['imagen_producto'] != $imagen['name'])){
		
				$imagen = $this->upload($imagen,4000,DIR_UPLOAD_OPENCART."img_product",'');
			}
			else
			{
				$imagen=$detalleP['imagen_producto'];
			}
		
		$sql = $this->db->query("UPDATE producto SET 
		codigo_producto='".$this->db->escape($codigo)."', 
		nombre_producto='".$this->db->escape($nombre)."', 
		imagen_producto='{$imagen}',
		detalle_producto='".$this->db->escape($detalle)."', 
		medida_id_medida='{$medida}' ,
		plataforma_id_plataforma='{$plataforma}',
		reserva_producto='{$reserva}',
		product_id_oc = '{$id_opencart}'
		WHERE id_producto='{$id_producto}';");

		$exec = $this->db->execute();
		
		if($exec==true)
		{
			
			$this->borrarCategoriaProducto($id_producto);
			$total_categorias = count($categoria);
			
			for($x=0;$x<$total_categorias;$x++){
			
				$this->agregarCategoriaProducto($categoria[$x],$id_producto);
				
			}
					
			return $id_producto;
		}
		else
		{
			return false;
		}
	
	}
//
//	
	public function verFotoProducto($id){
		
		$sql= $this->db->query("SELECT imagen_producto FROM producto WHERE id_producto ='{$id}'  ;");
		
		$exec = $this->db->row();
		
		if($exec>0)
		{
			return $exec['imagen_producto'];
		}
		else
		{
			return 'catalog/default.jpg';
		}
	}
//
//
	public function detalleProductoOc($id){
		
		$sql= $this->db->query("SELECT * FROM producto WHERE product_id_oc ='{$id}';");
		
		$exec = $this->db->row();

		return $exec;
	}	
	public function verUltimoIdProducto(){
		
		$sql= $this->db->query("SELECT id_producto FROM producto ORDER BY id_producto DESC LIMIT 0,1  ;");
		
		$exec = $this->db->row();
		
		if($exec>0)
		{
			return $exec['id_producto'];
		}
		else
		{
			return 0;
		}
	}
//
//	
	public function verProductoPedido($id_pedido){
		
		$sql= $this->db->query("SELECT * FROM producto 
			inner join plataforma on plataforma_id_plataforma=id_plataforma 
			inner join orden_compra_producto on orden_compra_producto.producto_id_producto=id_producto 
			inner join orden_compra on orden_compra_id_orden_compra=id_orden_compra INNER JOIN pedido_producto ON pedido_producto.producto_id_producto=id_producto WHERE pedido_id_pedido = '{$id_pedido}';");
		
		$exec = $this->db->rows();
	
		return $exec;	
		
	}
	
	public function verIdOpencart($id_producto){
		
		$sql= $this->db->query("SELECT product_id_oc FROM producto 
			WHERE id_producto = '{$id_producto}';");
		
		$exec = $this->db->row();
	
		return $exec['product_id_oc'];	
		
	}
	public function verProductoOrden($id_orden){
		
		$sql= $this->db->query("SELECT * FROM producto INNER JOIN orden_compra_producto ON producto_id_producto=id_producto  WHERE orden_compra_id_orden_compra = '{$id_orden}';");
		$exec = $this->db->rows();
	
		return $exec;	
		
	}
	
	public function agregarPrecioVenta($id_producto,$precio_mayorista,$precio_minorista,$precio_redcompra,$lista1,$lista2,$lista3){
		
		$sql = $this->db->query("INSERT INTO producto_precio_venta (precio_mayorista_producto_precio_venta, precio_minorista_producto_precio_venta, precio_redcompra_producto_precio_venta,precio_lista1_producto_precio_venta,precio_lista2_producto_precio_venta,precio_lista3_producto_precio_venta, fecha_producto_precio_venta,  producto_id_producto) VALUES ( '{$precio_mayorista}', '{$precio_minorista}', '{$precio_redcompra}','{$lista1}','{$lista2}','{$lista3}', '".$this->system->hoyHora()."', '{$id_producto}');");
				
		$exec = $this->db->execute();
		
		$id = $this->db->ultimoId();
	
		return $id;	
		
	}
	
	public function setearPrecioVenta($id_producto,$id_precio_compra){
		
		$sql= $this->db->query("UPDATE producto_precio_venta SET activado_producto_precio_venta = 0 WHERE producto_id_producto = '{$id_producto}' AND id_producto_precio_venta <> '{$id_precio_compra}'");
				
		$exec = $this->db->execute();
	
		return $exec;	
		
	}
	
	
	public function borrarCategoriaProducto($id_producto){
				
		$sql = $this->db->query("DELETE FROM categoria_producto WHERE producto_id_producto='{$id_producto}';");
		$exec = $this->db->execute();
		
	
	}
	public function agregarCategoriaProducto($categoria,$id_producto){
				
		$sql = $this->db->query("INSERT INTO categoria_producto (categoria_id_categoria, producto_id_producto) VALUES ({$categoria}, {$id_producto});");
		$exec = $this->db->execute();
		
	
	}
	
	public function agregarStockProducto($stock, $critico, $id_sucursal,$id_producto){
		

		$sql = $this->db->query("INSERT INTO sucursal_producto (sucursal_id_sucursal, producto_id_producto, stock_sucursal_producto, stock_critico_sucursal_producto) VALUES ('{$id_sucursal}', '{$id_producto}', '{$stock}', '{$critico}');");
		
	
		$exec = $this->db->execute();
		return $exec;
		
	
	}
	public function actualizarStockProducto($stock, $critico, $id_sucursal,$id_producto){
		

		$sql = $this->db->query("UPDATE sucursal_producto SET stock_sucursal_producto='{$stock}', stock_critico_sucursal_producto='{$critico}' WHERE producto_id_producto = '{$id_producto}' AND sucursal_id_sucursal='{$id_sucursal}';");
		
	
		$exec = $this->db->execute();
		
		return $exec;
	}
	
	public function actualizarStockCritico( $critico, $id_sucursal,$id_producto){
		

		$sql = $this->db->query("UPDATE sucursal_producto SET  stock_critico_sucursal_producto='{$critico}' WHERE producto_id_producto = '{$id_producto}' AND sucursal_id_sucursal='{$id_sucursal}';");
	
		$exec = $this->db->execute();
		
		return $exec;	
	}
	
	public function actualizacionStock($id_producto, $id_sucursal, $stock){
		
		$revisionStock=$this->verStockProducto($id_producto, $id_sucursal);
		
		if($revisionStock==false)
		{
			$exec=$this->agregarStockProducto($stock, 0, $id_sucursal,$id_producto);
		}
		else
		{
			$stockFinal=$stock+$revisionStock[0]['stock_sucursal_producto'];
			
			$sql=$this->db->query("UPDATE sucursal_producto SET stock_sucursal_producto='{$stockFinal}' WHERE producto_id_producto = '{$id_producto}' AND sucursal_id_sucursal='{$id_sucursal}';");
			
			$exec= $this->db->execute();
			
		}
		return $exec;
	}
	
	public function verStockProducto($id_producto, $id_sucursal){
		$sql = $this->db->query("SELECT stock_sucursal_producto FROM sucursal_producto WHERE producto_id_producto = '{$id_producto}' AND sucursal_id_sucursal='{$id_sucursal}';");
		$exec = $this->db->rows();
		return $exec;
	}

	
	public function verPrecioCompra($id_producto){
		
		$sql = $this->db->query("SELECT * FROM producto_precio_compra 
		INNER JOIN sucursal ON sucursal_id_sucursal = id_sucursal
		LEFT JOIN orden_compra ON id_orden_compra = orden_compra_id_orden_compra
		LEFT JOIN proveedor ON proveedor_id_proveedor = id_proveedor
		WHERE producto_id_producto = '{$id_producto}' ;");
		
		$exec = $this->db->rows();
		
		return $exec;
	}
	
	public function listarCodigo($codigo_producto){

		$sql = $this->db->query("SELECT * FROM producto WHERE codigo_producto LIKE '%{$codigo_producto}%' OR nombre_producto LIKE '%{$codigo_producto}%';");
		
		$exec = $this->db->rows();
		return $exec;	
	}
	public function listarCodigoPlataforma($codigo_producto){

		$sql = $this->db->query("SELECT * FROM producto 
								INNER JOIN plataforma ON plataforma_id_plataforma = id_plataforma 
								WHERE codigo_producto LIKE '%{$codigo_producto}%' 
								OR nombre_producto LIKE '%{$codigo_producto}%' 
								OR descripcion_plataforma LIKE '%{$codigo_producto}%' 
								AND ver_producto = 1 ;");
		
		$exec = $this->db->rows();
		return $exec;	
	}
	
	public function detalleProducto($id){
		
		$sql = $this->db->query("SELECT * FROM producto
		INNER JOIN medida ON id_medida = medida_id_medida
		INNER JOIN plataforma ON id_plataforma = plataforma_id_plataforma
		WHERE id_producto = '{$id}'  ;");
				
		$exec = $this->db->row();
		
		return $exec;	

	}
	
	public function verPrecios($id){
		
		$sql = $this->db->query("SELECT * FROM producto_precio_venta
		WHERE producto_id_producto = '{$id}' 
		ORDER BY activado_producto_precio_venta DESC
		 ;");
				
		$exec = $this->db->rows();
		
		return $exec;	

	}
	
	public function verPrecioActivado($id){
		
		$sql = $this->db->query("SELECT * FROM producto_precio_venta
		WHERE producto_id_producto = '{$id}' AND ver_producto_precio_venta='1' AND activado_producto_precio_venta='1'
		ORDER BY id_producto_precio_venta DESC
		LIMIT 0,1 ;");
				
		$exec = $this->db->row();
		
		return $exec;	

	}

	public function categoriasProducto($id){
		
		$sql = $this->db->query("SELECT categoria_id_categoria FROM categoria_producto
		WHERE producto_id_producto = '{$id}'  ;");
		
		$exec = $this->db->row();
		
		return $exec;	
		
		
	}
	public function actualizaRutas(){
		$sql = $this->db->query("SELECT * FROM producto;");
		$productos = $this->db->rows();
		foreach($productos as $clave => $valor)
		{
			$ruta=explode(".", $valor['imagen_producto']);
			if(count($ruta)>2)
			{
				array_pop($ruta);
				$foto=implode(".", $ruta);
				$id=$valor['id_producto'];
				rename(FOTO_RUTA_ABSOLUTA."img_product/".$valor['imagen_producto'],FOTO_RUTA_ABSOLUTA."img_product/".$foto);
				$sql = $this->db->query("UPDATE producto SET imagen_producto='{$foto}' WHERE id_producto='{$id}';");
				$exec= $this->db->execute();
			}
		}
	}
	
	public function verStockSucursal($id_producto,$id_sucursal){
			
		$sql = $this->db->query("SELECT  id_sucursal,nombre_sucursal,SUM(stock_producto_precio_compra) AS stock_producto_precio_compra,stock_critico_sucursal_producto
		FROM producto_precio_compra 
		INNER JOIN sucursal_producto ON sucursal_producto.producto_id_producto = producto_precio_compra.producto_id_producto
		INNER JOIN sucursal ON producto_precio_compra.sucursal_id_sucursal = sucursal.id_sucursal AND sucursal_producto.sucursal_id_sucursal =  producto_precio_compra.sucursal_id_sucursal
		WHERE  producto_precio_compra.producto_id_producto='{$id_producto}'  AND producto_precio_compra.sucursal_id_sucursal='{$id_sucursal}'");
		
		$exec =	$this->db->row();	

	return $exec;
		
	}
	
	// Editar Stock de un producto
	
	public function editarStock($id_producto_precio_compra, $stock_inicial_producto_precio_compra, $stock_producto_precio_compra, $precio_producto_precio_compra, $fecha_producto_precio_compra){
		$sql = $this->db->query("UPDATE producto_precio_compra SET 
									stock_inicial_producto_precio_compra='{$stock_inicial_producto_precio_compra}', 
									stock_producto_precio_compra='{$stock_producto_precio_compra}',
									precio_producto_precio_compra='{$precio_producto_precio_compra}',
									fecha_producto_precio_compra='{$fecha_producto_precio_compra}' 
									WHERE id_producto_precio_compra='{$id_producto_precio_compra}';");
		$exec= $this->db->execute();
		return $exec;
	}
	
	public function verStockCritico(){
			
		$sql = $this->db->query("SELECT * FROM producto WHERE 
		(SELECT SUM(stock_producto_precio_compra) FROM producto_precio_compra WHERE producto.id_producto = producto_precio_compra.producto_id_producto ) <= (SELECT stock_critico_sucursal_producto from sucursal_producto WHERE producto.id_producto = sucursal_producto.producto_id_producto AND ver_producto=1 LIMIT 0,1 )");
		
		$exec =	$this->db->rows();	

	return $exec;
		
	}
	
		public function verStockSucursalu($id_producto){
			
		$sql = $this->db->query("SELECT SUM(stock_producto_precio_compra) AS stock_producto_precio_compra FROM producto_precio_compra WHERE producto_id_producto = '{$id_producto}'");
		
		$exec =	$this->db->row();	

	return $exec['stock_producto_precio_compra'];
		
	}
	
	public function listarCodigoPlataformaStock($codigo_producto){

		$sql = $this->db->query("SELECT *
								FROM producto 
								INNER JOIN plataforma ON plataforma_id_plataforma = id_plataforma
								INNER JOIN producto_precio_venta ppv ON id_producto = ppv.producto_id_producto
								WHERE (codigo_producto LIKE '%{$codigo_producto}%' OR nombre_producto LIKE '%{$codigo_producto}%' OR descripcion_plataforma LIKE '%{$codigo_producto}%') ;");
		$exec = $this->db->rows();
		return $exec;	
	}


	public function verStockCero(){
			
		$sql = $this->db->query("SELECT * FROM producto WHERE (SELECT SUM(stock_producto_precio_compra) FROM producto_precio_compra WHERE producto.id_producto = producto_precio_compra.producto_id_producto ) = 0 AND ver_producto=1");
		
		$exec =	$this->db->rows();	

	return $exec;
		
	}
	
		public function verStockCriticoSucursales($sucursal){
			
		$sql = $this->db->query("SELECT * FROM producto WHERE 
		(SELECT SUM(stock_producto_precio_compra) AS stock FROM producto_precio_compra WHERE producto.id_producto = producto_precio_compra.producto_id_producto AND producto_precio_compra.sucursal_id_sucursal = '{$sucursal}' AND (SELECT SUM(stock_producto_precio_compra) as stock FROM producto_precio_compra WHERE producto.id_producto = producto_precio_compra.producto_id_producto AND producto_precio_compra.sucursal_id_sucursal = '{$sucursal}') <> 0 ) <= (SELECT stock_critico_sucursal_producto from sucursal_producto WHERE producto.id_producto = sucursal_producto.producto_id_producto AND ver_producto=1 AND sucursal_producto.sucursal_id_sucursal = '{$sucursal}'  LIMIT 0,1 );");
				
		$exec =	$this->db->rows();	

	return $exec;
		
	}
	
	
	public function productosStockCeroSucursales($sucursal){
			
		$sql = $this->db->query("SELECT * FROM producto WHERE (SELECT SUM(stock_producto_precio_compra) FROM producto_precio_compra WHERE producto.id_producto = producto_precio_compra.producto_id_producto AND producto_precio_compra.sucursal_id_sucursal = '{$sucursal}'  ) = 0 AND ver_producto=1");
		
		
		$exec =	$this->db->rows();	

	return $exec;
		
	}
	
	public function totalProductoSucursal($sucursal){
			
		$sql = $this->db->query("SELECT COUNT(DISTINCT(producto_id_producto)) AS total FROM producto_precio_compra 
		INNER JOIN producto ON producto_id_producto = id_producto
		WHERE sucursal_id_sucursal={$sucursal} AND producto.ver_producto=1" );
		
		$exec =	$this->db->row();	

	return $exec;
		
	}
//	
	public function octoinvProducto($result){
		
		$id_plataforma = 1; // id pivote (por reemplazar)

		$sql = $this->db->query("INSERT INTO producto(codigo_producto, nombre_producto, detalle_producto, imagen_producto, reserva_producto, medida_id_medida, ver_producto, product_id_oc, plataforma_id_plataforma ,plataforma_desc_producto) VALUES ('".$this->db->escape($result['sku'])."','".$this->db->escape($result['name'])."','".$this->db->escape($result['description'])."','".$this->db->escape($result['image'])."',".$this->db->escape($result['reserva']).",".$this->db->escape($result['length_class_id']).",".$this->db->escape($result['ver_producto']).",".$this->db->escape($result['product_id']).", $id_plataforma ,'".$this->db->escape($result['plataforma'])."');");

		//rows, row, execute.
		$exec = $this->db->execute();

		if($exec==true)
		{
			$id = $this->db->ultimoId();
												
			return $id;
			
		}else{
			
			return false;
		}		
	}
	//
	public function octoPrecioCompra($id_producto,$id_sucursal,$precio,$stock_pedido,$fecha_ingreso){
		
				
		$stock_pedido = $this->isNull($stock_pedido);

		$sql = $this->db->query("INSERT INTO producto_precio_compra(precio_producto_precio_compra, stock_producto_precio_compra, stock_inicial_producto_precio_compra, fecha_producto_precio_compra, producto_id_producto, sucursal_id_sucursal) VALUES ({$precio},{$stock_pedido},{$stock_pedido},'{$fecha_ingreso}',{$id_producto},{$id_sucursal});");
				
		$exec = $this->db->execute();
		
		$sql = $this->db->query("INSERT INTO `sucursal_producto` (`sucursal_id_sucursal`, `producto_id_producto`, `stock_sucursal_producto`, `stock_critico_sucursal_producto`) VALUES ('{$id_sucursal}', '{$id_producto}', {$stock_pedido}, '1');");
		
		$exec = $this->db->execute();

				
		return $exec;
	}
//


}
	
?>