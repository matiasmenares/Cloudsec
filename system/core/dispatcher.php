<?php

class Dispatcher {

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
	
	public function controlador($archivo,$directory) { 
	    
		$class = preg_replace('/[^a-zA-Z0-9]/','', $directory.$_SESSION['menu']);
		
	    if (file_exists($archivo)) {
		    
			include_once($archivo);	
				
				if(class_exists($class)) {

				$clase = new $class($this->registry);
				
				$instance = $this->instance;
				
					if($this->checkMethod($clase,$instance) == true){
						
						$clase->$instance();
					 					 	
					}else{
						
						if($this->checkMethod($clase,"index") == true){
						
							$clase->index();
						
						}else{
						
							$this->triggerError("404",array("Method <b>index()</b> does not exist in <b>".$class."</b>.","Error Method file: <b>".$archivo.$_SESSION['menu']."</b>"));

						}
						
					}
	
				return $clase;
			
				}else{
					
					$this->triggerError("404",array("Class <b>".$class."</b> does not exist","Error Class file : <b>".$archivo."</b>"));
					
				}
			
		}else{
			
			$this->triggerError("404",array("File: <b>".$archivo."</b> does not exist"));
									
		}
	    
    }
    
	
	public function setInstance($controller) {
		
		$delimiter = "_";
		
		$pos = strpos($controller, $delimiter);
		
		if ($pos === false) {
			
			
			$this->instance = "index";
	
		} else {
		
			$instance = explode("_", $controller);
			
			$this->instance = $instance[1];
    
   		}
		
	}
	public function checkMethod($class,$method) {
		
		$check = method_exists($class,$method);

		return $check;
		
	}
	
	public function triggerError($num_error,$error){
		
		if(DEBUG == 'TRUE'){
				
			$this->session->data["error_debug"] = $error;
			
			$this->session->data["menu"]  = $num_error ;
				
			$this->controlador(CONTROLLER_DIR."error/".$num_error.".php","error/");					
		}else{
							
			$this->session->set("menu","404");
				
			$this->controlador(CONTROLLER_DIR."error/".$num_error.".php","error/");	
				
		}

	}


	
}
	
?>