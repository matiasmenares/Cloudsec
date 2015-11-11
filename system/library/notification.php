<?php	
	
final class Notification {

	protected $registry;

	public function __construct($registry) {
		$this->registry = $registry;
	}
	public function __get($key) {
		return $this->registry->get($key);
	}

	public function __set($key, $value) {
		$this->registry->set($key, $value);
	}


	public function pedidosPendientes(){
		
			$pedido = $this->load->model("Pedido");
			
			$cantidad = $pedido->verPerdidosPorEstado(1);
			
			if($cantidad == FALSE){
				$cantidad = 0;
			}else{
				$cantidad = count($cantidad);
			}
		return $cantidad;
	}
	
	public function productosStockCritico(){
		
		$producto = $this->load->model("Producto");

		$cantidad = $producto->verStockCriticoSucursales($this->session->data['sucursal_id_sucursal']);
		
		if($cantidad != false){
			$out = count($cantidad);
		}else{
			$out = 0;
		}
		return $out;
	}
	
	public function productosStockCero(){
		
			$producto = $this->load->model("Producto");
			
			$cantidad = $producto->verStockCero();
			
			if($cantidad == FALSE){
				
				$cantidad = 0;
				
			}else{
				
				$cantidad = count($cantidad);

			}
						
		return $cantidad;
			
	}
	

}

?>