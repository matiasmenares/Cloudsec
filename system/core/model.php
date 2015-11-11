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
*													|    FrameWork 2.0.1	|		*
*																					*
*************************************************************************************/



class Model {
	
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

    protected function auth($user,$pass,$table,$colum_user,$colum_pass,$colum_valid=null,$id_valid=1,$encrypt='sha1',$force=2,$user_session){
	    
	    
		$usuario= $this->db->escape($user);
		
		if($encrypt == 'sha1'){
			
			switch($force){
			
				case 1:
					$contrasenia = $this->db->escape(sha1($pass));
				break;
				case 2:
					$contrasenia = $this->db->escape(sha1(sha1($pass)));
				break;
				case 3:
					$contrasenia = $this->db->escape(sha1(sha1(sha1($pass))));
				break;
			
			}
		
		}elseif($encrypt == 'md5'){
				
			switch($force){
			
				case 1:
					$contrasenia = $this->db->escape(md5($pass));
				break;
				case 2:
					$contrasenia = $this->db->escape(md5(md5($pass)));
				break;
				case 3:
					$contrasenia = $this->db->escape(md5(md5(md5($pass))));
				break;
			
			}

			
		}
		
		if($colum_valid <> NULL){
			
			$estado_valido = "AND {$colum_valid} = '{$id_valid}'";
			
		}else{
			
			$estado_valido = "";
			
		}
		
	   	$sql = $this->db->query("SELECT * FROM  {$table} where {$colum_user} LIKE '{$usuario}' {$estado_valido};");
	   	
	  	$query = $this->db->rows();

   		$ses = $query[0];
   		
   		$valido = false;

   		if($this->db->numRows()>0)
   		{
   		
	 		if($ses[$colum_pass] == $contrasenia)
	        {
		       $num_session = count($user_session);
		       		       
	          	for($x=0;$x<$num_session;$x++){
	          					  		
			  		$this->session->data[$user_session[$x]] = $ses[$user_session[$x]];
				}
				
				$this->session->data["menu_side"] = 1;
									
	            $valido = true;
	
	   		}
	   	}
	   		
	   		return $valido;
	    
    }
    
    
    	
	public function isNull($var) {
		
		if($var==null){
		    
		    $var = "NULL";
		    
	    }else{
		    
		    $var = "'{$var}'";
	    }
	  
	
	return $var;
	
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