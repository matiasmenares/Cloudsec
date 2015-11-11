<?php
	
 class ProductoLista extends Controller {
	
		
	public function index() {
		
		if(isset($this->request->post['delProd'])){
			
			$producto  = $this->load->model("Producto");
			$eliminar = $producto->eliminarProducto($this->request->post['id_producto']);
			$id_opencart = $producto->verIdOpencart($this->request->post['id_producto']);
			$this->opencart->updateStatus($id_opencart,0);
			
			if($eliminar != false){

				$this->system->notify(1,"Agregado", "¡Producto Eliminado Con Éxito!");
				
			}else{
				$this->system->notify(2,"Error", "¡Producto No Pudo Eliminarse!");
			}
			
			
		}
		
		$output['dato'] = null;
		
		$vista = TEMPLATE."producto/lista-producto.php";
		
		$this->render($vista,$output);

	}		
	
}

?>