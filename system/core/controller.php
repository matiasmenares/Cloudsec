<?php
	
/************************************************************************************
*																					*
*  Code by:																			*
*      ___           ___         ___                     ___           ___     		*
*     /  /\         /  /\       /  /\        ___        /  /\         /  /\    		*
*    /  /::\       /  /::\     /  /::\      /  /\      /  /:/_       /  /:/    		*
*   /  /:/\:\     /  /:/\:\   /  /:/\:\    /  /:/     /  /:/ /\     /  /:/     		*
*  /  /:/~/::\   /  /:/~/:/  /  /:/~/:/   /  /:/     /  /:/ /:/_   /  /:/  ___ 		*
* /__/:/ /:/\:\ /__/:/ /:/  /__/:/ /:/   /  /::\    /__/:/ /:/ /\ /__/:/  /  /\		*
* \  \:\/:/__\/ \  \:\/:/   \  \:\/:/   /__/:/\:\   \  \:\/:/ /:/ \  \:\ /  /:/		*
*  \  \::/       \  \::/     \  \::/    \__\/  \:\   \  \::/ /:/   \  \:\  /:/ 		*
*   \  \:\        \  \:\      \  \:\         \  \:\   \  \:\/:/     \  \:\/:/  		*
*    \  \:\        \  \:\      \  \:\         \__\/    \  \::/       \  \::/   		*
*     \__\/         \__\/       \__\/                   \__\/         \__\/    		*
*																					*
*													|    FrameWork 2.1.2	|		*
*																					*
*************************************************************************************/



class Controller {

	protected $registry;
	public $model;
	public $data;
	public $instance;
	public $controlador;	

	public function __construct($registry) {
		$this->registry = $registry;
		$this->header = true;
		
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
	
    public function invocar($nav=null) { 
		
		$this->session->destroy("menu");
		$this->session->destroy("menu_1");
		$this->session->destroy("menu_2");
	    	    
	    if(isset($nav)){
		    
		    $this->session->data["menu"] = $nav;
		    
	    }else{ 
		    
		    
		    if(!isset($this->request->get['car'])){
			    
			   	$directory = "";
			   
		    }else{
			    
			    $directory = $this->request->get['car']."/";
		    }
		     	    
			if(!isset($this->request->get['nav'])){
				
				$this->session->data["menu"] = "home";
				 
				$this->dispatcher->setInstance(NULL);

			}else{
								
				$this->dispatcher->setInstance($this->request->get['nav']);

				$this->session->data["menu"] = $this->setController($this->request->get['nav']);

			}
		}
		
			@$api = explode("/",$this->request->get['nav']);

			if($_SESSION['menu'] <> 'login'  AND $api[0] <> "apirest"){
				
				//Sólo usar Cuando Exista un Backend y/o Alguna Autentificación
				
				$this->system->logeado();

			}
			
			$controlador = CONTROLLER_DIR.$directory."{$_SESSION['menu']}.php";
		
			
			$this->controlador = $this->dispatcher->controlador($controlador,$directory);
		
    }

    public function render($vista,$data=null,$idioma=null) {
	    
	    if(!empty($data)){
	    
	 	    extract($data, EXTR_PREFIX_SAME, "data");

	 	 	}
	 	 
		 	if(!empty($idioma)){
		 	
			 	$textos = $this->idioma($idioma);
		 	
	 	    extract($textos, EXTR_PREFIX_SAME, "textos");
		 	}
	 	    
		 	if (file_exists($vista)) {
	 	
			 	if($this->header != false){
		 	
			 		$this->includeHeader();
			 	}

				include_once($vista);
						
			}else{
			
				$this->dispatcher->triggerError("404",array("File: <b>".$vista."</b> does not exist."));
			
				die();
		
    	} 
    
    }
     
    
	public function idioma($archivo) { 
		
		$file =  str_ireplace(".php","",$archivo);
	    
		$idioma = "lenguaje/".IDIOMA.$file.".php";

	    if (file_exists($idioma)){

			include_once($idioma);
			
			return $texto;
						
		}else{
			
			if(DEBUG == 'TRUE'){

			echo "<h4>Error Archivo Idioma : ".$idioma."  no existe</h4>";
			
			}
			
			die();
		}
	    
    }    
		
	public function setController($controller) {
		
		$delimiter = "_";
		
		$pos = strpos($controller, $delimiter);
		
		if ($pos === false) {
			
			$this->controller = $controller;
	
		} else {
		
			$controll = explode("_", $controller);
			
			$this->controller = $controll[0];
    
   		}
   		
   		return $this->controller;
		
	}
	
	public function includeHeader(){
		
		require(TEMPLATE.'/comun/head.php');
	 		
		require(TEMPLATE.'/comun/css.php'); 
	}
	
	public function noHeader(){
		
		$this->header = false;
	}
	
	public function upload($uploaded,$size=4000,$carpeta=DIR_UPLOAD_OPENCART,$id=''){
		if((!empty($uploaded)) && ($uploaded['error'] == 0)) {
			$filename = basename($uploaded['name']);
		 	$ext = substr($filename, strrpos($filename, '.') + 1);
				if (($ext == "jpg") || ($ext == "png") && ($uploaded["type"] == "image/jpeg") && ($uploaded["size"] < 550000)) {
				    //Determine the path to which we want to save this file
				      //Check if the file with the same name is already exists on the server
					  $prefijo = substr(md5(uniqid(rand())),0,6);
				      $nombre = "catalog/".$id.$filename;
				      $path = $carpeta.'/';
				      				      
				      if (!file_exists($nombre)) {
				        //Attempt to move the uploaded file to it's new place
				        if (move_uploaded_file($uploaded['tmp_name'],$path.$nombre)) {
					        $this->system->resize($id.$filename,40,40,DIR_UPLOAD_OPENCART."catalog",DIR_UPLOAD_OPENCART."cache/catalog/");
							$this->system->resize($id.$filename,100,100,DIR_UPLOAD_OPENCART."catalog",DIR_UPLOAD_OPENCART."cache/catalog/");
				           return $nombre;
				           
				        } else {
				           
				           echo "Error: A problem occurred during file upload!";
				        }
								} else {
				   		      echo "Error: File ".$uploaded["name"]." already exists";
				   			  }
				} else {
		     echo "Error: Only .jpg images under 350Kb are accepted for upload";
			 }
		  } else {
		 $nombre = 'catalog/default.jpg';
		 return $nombre;
		 }

	}

	
     
}
?>