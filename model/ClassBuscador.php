<?php 
	class ClassBuscador extends Model {
	
	
	public function busquedaFrase($busqueda){
		$sql = $this->db->query("SELECT * FROM orden_compra INNER JOIN orden_compra_producto ON orden_compra_id_orden_compra=id_orden_compra INNER JOIN producto ON producto_id_producto=id_producto WHERE MATCH(nombre_pedido) AGAINST ('+{$busqueda}' IN BOOLEAN MODE) OR MATCH(descripcion_pedido) AGAINST ('+{$busqueda}' IN BOOLEAN MODE) GROUP BY id_pedido LIMIT 0,10;");
		$exec =	$this->db->rows();	
		return $exec;
	}
		
	public function busquedaPalabra($busqueda){
		$sql = $this->db->query("SELECT * FROM orden_compra INNER JOIN orden_compra_producto ON orden_compra_id_orden_compra=id_orden_compra INNER JOIN producto ON producto_id_producto=id_producto WHERE nombre_orden_compra LIKE '%{$busqueda}%' OR descripcion_orden_compra LIKE '%{$busqueda}%' GROUP BY id_orden_compra LIMIT 0,10;");
		$exec =	$this->db->rows();	
		return $exec;
	}
	
}
?>