<?php
	
 class ProductoStock extends Controller {
	
		
	public function index() {
		
		$output['dato'] = null;
		$sucursal = $this->load->model("Sucursal");
		
		$output['sucursal'] = $sucursal->verSucursal();
		
		if(isset($this->request->get['var1'])){
			$this->system->notify(1,"Modificado", "¡Producto Modificado Con Éxito!");	
		}
				
		$this->render(TEMPLATE."producto/stock-producto.php",$output);

	}
	
		
	
}

?>