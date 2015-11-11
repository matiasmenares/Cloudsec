<?php
	
 class Buscar extends Controller {
	
		
	public function index() {
	
		if(isset($this->request->post)){
			
			$buscador  = $this->load->model("Buscador");
			
			$termino=$this->request->post['buscar'];
			$esFrase=explode(" ", $termino);
			if(count($esFrase)>1)
				{
					$buscar=$buscador->busquedaFrase($termino);	
				}
				else
				{
					$buscar=$buscador->busquedaPalabra($termino);
				}
			
			
		}

		
		$output['buscar']=$buscar;

		$vista = TEMPLATE."ajax/busqueda.php";
		
		$this->render($vista,$output);


	}
}

?>