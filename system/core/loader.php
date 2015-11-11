<?php 
	
final class Loader{
		
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
	

	public function setRegistro($registry) {
		$this->registry = $registry;
	}	

		
		public function model($model){
	    
	    $model = str_ireplace(".php","",$model);
	    
		$file = 'model/Class' . $model . '.php';
		
		$class = "Class".preg_replace('/[^a-zA-Z0-9]/', '', $model);

		if (file_exists($file)) {
			
			include_once($file);
			
			$modelo = new $class($this->registry);	
			
			return $modelo;		
			
		} else {
			
			if(DEBUG == 'TRUE'){

			echo 'Error: No se pudo cargar el modelo ' . $file . '!';

			
			}else{
				
			$this->system->redirect(ERROR_404);	
				
			}
			
			die();
		}
	}		
		
		
		
		
}