<?php
class classPedido extends Model { 
	
	public function verPedido($id_pedido){
			
		$sql = $this->db->query("SELECT * FROM pedido 
        INNER JOIN pago pag ON pedido.pago_id_pago = pag.id_pago
		INNER JOIN mayorista ON mayorista_id_mayorista = id_mayorista
		INNER JOIN sucursal ON id_sucursal = sucursal_id_sucursal
		LEFT  JOIN mayorista_usuario ON id_mayorista_usuario = mayorista_usuario_id_mayorista_usuario
		LEFT  JOIN impuesto ON pedido.impuesto_id_impuesto = id_impuesto
		WHERE id_pedido = '{$id_pedido}'
		");

		$exec =	$this->db->row();	

		return $exec;
		
	}
	public function verUltimoEstado($id_pedido){
			
		$sql = $this->db->query("SELECT * FROM estado_pedido_pedido 
		INNER JOIN estado_pedido ON estado_pedido_id_estado_pedido = id_estado_pedido
		WHERE pedido_id_pedido = '{$id_pedido}'
		ORDER BY id_estado_pedido_pedido DESC
		LIMIT 0,1
		");
		
		
		$exec =	$this->db->row();	

	return $exec;
		
	}
	
	public function verUltimoSeguimiento($id_pedido){
			
		$sql = $this->db->query("SELECT * FROM estado_pedido_pedido 
		INNER JOIN estado_pedido ON estado_pedido_id_estado_pedido = id_estado_pedido
		WHERE pedido_id_pedido = '{$id_pedido}'
		ORDER BY id_estado_pedido_pedido DESC
		");
		
		$exec =	$this->db->rows();	

	return $exec;
		
	}
	
	
	public function restarStock($id_sucursal,$id_producto,$stock){
		
		
		$sql = $this->db->query("UPDATE sucursal_producto SET stock_sucursal_producto = stock_sucursal_producto - {$stock} WHERE producto_id_producto = '{$id_producto}' AND sucursal_id_sucursal = '{$id_sucursal}'");
		
		$exec =	$this->db->execute();

	return $exec;
		
	}
	
public function modificarPedidoEnvio($pedido_id_pedido , $tracking_pedido_envio, $orden_trabajo_pedido_envio){
		
		
		$sql = $this->db->query("UPDATE pedido_envio SET tracking_pedido_envio = '{$tracking_pedido_envio}', orden_trabajo_pedido_envio='{$orden_trabajo_pedido_envio}'  WHERE pedido_id_pedido = '{$pedido_id_pedido}' ");//ESTO ESTA MAL PLANTEADO YA QUE ESTAS TOMANDO UN GET DEL PEDIDO Y COMPARANDOLO CON EL ID DEL ENVIO SON 2 COSAS DISTINTAS

		$exec =	$this->db->execute();

	return $exec;
		
	}
		
	public function verProductos($id_pedido){
			
		$sql = $this->db->query("SELECT * FROM pedido_producto
		INNER JOIN producto ON producto_id_producto = id_producto
		INNER JOIN plataforma ON plataforma_id_plataforma = id_plataforma
		INNER JOIN producto_precio_venta ON producto_precio_venta_id_producto_precio_venta = id_producto_precio_venta
		WHERE pedido_id_pedido = '{$id_pedido}'
		");
		
		$exec =	$this->db->rows();	

	return $exec;
		
	}
	
	public function verPedidoEnvio($id_pedido){
			
		$sql = $this->db->query("SELECT * FROM pedido_envio pe
		LEFT JOIN pedido p ON p.id_pedido = pe.pedido_id_pedido
		LEFT JOIN courier c ON c.id_courier = pe.courier_id_courier
		LEFT JOIN comuna co ON co.id_comuna = pe.comuna_id_comuna
		WHERE pe.pedido_id_pedido = '{$id_pedido}'
		");

		$exec =	$this->db->row();	

	return $exec;
		
	}
	
	public function cambiarEstado($id_pedido,$comentario,$id_estado){
		
		$id_pedido = (INT) $id_pedido;
		$id_estado = (INT) $id_estado;
		
		$sql = $this->db->query("INSERT INTO estado_pedido_pedido (estado_pedido_id_estado_pedido, pedido_id_pedido, descripcion_estado_pedido_pedido, fecha_estado_pedido_pedido) VALUES ('{$id_estado}', '{$id_pedido}', '".$this->db->escape($comentario)."', '".$this->system->hoyHora()."');");
				
		$exec = $this->db->execute();
		
		
	return $exec;
		
	}
	
	public function verEstados(){
			
		$sql = $this->db->query("SELECT * FROM estado_pedido WHERE ver_estado_pedido=1");

		$exec =	$this->db->rows();	

	return $exec;
		
	}
	
	public function verPerdidosPorEstado($id_estado){
			
		$sql = $this->db->query("SELECT * FROM pedido  WHERE (SELECT id_estado_pedido FROM estado_pedido_pedido 
											  INNER JOIN estado_pedido ON estado_pedido_id_estado_pedido = id_estado_pedido 
											  WHERE pedido_id_pedido = pedido.id_pedido ORDER BY id_estado_pedido_pedido DESC LIMIT 0,1) = '{$id_estado}'");
		$exec =	$this->db->rows();	

	return $exec;
		
	}
	public function verCantidadElementosEstado($id_estado){
		$sql = $this->db->query("SELECT count(id_pedido) AS cuenta
			FROM `pedido`
			WHERE (
					SELECT estado_pedido_id_estado_pedido FROM estado_pedido_pedido  
					WHERE pedido_id_pedido = pedido.id_pedido ORDER BY id_estado_pedido_pedido DESC LIMIT 0,1) = {$id_estado}
			ORDER BY `id_pedido` ASC");
			
			//rows, row, execute.
			$exec = $this->db->row();
			return $exec['cuenta'];	
	
	}

	//SENTENCIAS SQL PARA EL DASHBOARD
	
	public function pedidosPendientesSucursal($id_estado,$id_sucursal){
			
		$sql = $this->db->query("SELECT * FROM pedido INNER JOIN sucursal ON sucursal_id_sucursal = id_sucursal 
									WHERE (SELECT id_estado_pedido 
									FROM estado_pedido_pedido INNER JOIN estado_pedido ON estado_pedido_id_estado_pedido = id_estado_pedido 
									WHERE pedido_id_pedido = pedido.id_pedido 
									ORDER BY id_estado_pedido_pedido 
									DESC LIMIT 0,1) = '{$id_estado}'AND pedido.sucursal_id_sucursal = '{$id_sucursal}';
");
		$exec =	$this->db->rows();	

	return $exec;
		
	}
	
}
	
?>