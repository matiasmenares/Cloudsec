<?php
class ClassReportePOS extends Model { 
	
	
	public function ventaSucursal($id_sucursal){
		
		$sql = $this->db->query("SELECT sum(total_neto_venta) AS total , nombre_sucursal FROM venta
		INNER JOIN caja ON caja_id_caja = id_caja
		INNER JOIN sucursal ON sucursal_id_sucursal = id_sucursal
		WHERE sucursal_id_sucursal = '{$id_sucursal}';");
	
		$exec = $this->db->row();
		
	return $exec;
	
	}
	
	public function ventaSucursales(){
		
		$sucursal = $this->verSucursal();
		
		$sucursales = count($sucursal);
		
		if($sucursales>0){
			
			for($x=0;$x<$sucursales;$x++){
				
				$detalle_sucursal = $this->ventaSucursal($sucursal[$x]['id_sucursal']);
								
				$output[$x]['total'] = $detalle_sucursal['total'];
				$output[$x]['nombre_sucursal'] =  $detalle_sucursal['nombre_sucursal'];

			}
			
		}else{
			
			$output[0] = 0;
			
		}
				
	return $output;
	
	}
	
	public function verSucursal(){
			
		$sql = $this->db->query("SELECT * FROM sucursal WHERE cliente_sucursal = '1' AND ver_sucursal = '1'");

		$exec =	$this->db->rows();	

	return $exec;
		
	}
	
	public function totalVentaSucursales(){
			
		$sql = $this->db->query("SELECT sum(total_neto_venta) AS total FROM venta
		WHERE 1;");

		$exec =	$this->db->row();	

	return $exec['total'];
		
	}
	
	public function totalCompraSucursales(){
			
		$sql = $this->db->query("SELECT SUM(precio_compra_producto_venta*cantidad_producto_venta) AS total FROM producto_venta WHERE 1");

		$exec =	$this->db->row();	

	return $exec['total'];
		
	}
	
	
	
	public function utilidad(){
		
		$venta = $this->totalVentaSucursales();
		
		$compra = $this->totalCompraSucursales();
		
		return $venta-$compra;
	}
	
	
	public function porcentajeVentaSucursales(){
			
		$sucursal = $this->ventaSucursales();
		
		if($sucursal>0){
			
			$total_venta = $this->totalVentaSucursales();
			
			$total_sucursales = count($sucursal);
			
			for($x=0;$x<$total_sucursales;$x++){
				
				$output[$x]['total'] = ($sucursal[$x]['total']/$total_venta)*100;
				$output[$x]['nombre'] = $sucursal[$x]['nombre_sucursal'];

			}
			
		}

	return $output;
		
	}
	
}	
?>