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
*													|    FrameWork 2.0.x	|		*
*																					*
*************************************************************************************/

class Conectar extends Secure{
	
//Datos de Conexión

 private static $db_host = HOST;
 private static $db_usuario = USER;
 private static $db_pass = PASSWORD;
 private static $db_nombre = DB_NAME;
 private static $db_puerto = PORT;

	private $sql;


	function __construct(){
		
        if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
        	//COMPROBANDO SI EXISTE MySQLi EN SERVER
					exit('<b>ALERTA!</b> No existe la función MySQLi en este servidor!');
		}else{
				
	        try {
			  		   	
			   	//CONEXION A BASE DE DATOS
			    $this->database = @new mysqli(self::$db_host, self::$db_usuario, self::$db_pass, self::$db_nombre,self::$db_puerto);
			    
			    if(mysqli_connect_errno()) {
				     
	                throw new Exception('No se pudo conectar a la base de datos.');
	                
	            }
			  }catch(Exception $e) {
				  
	            $this->enviarReporte($e->getMessage());
	            
				if(DEBUG == 'TRUE'){
	
					echo "No se pudo Conectar a la base de datos";
	            
	            }else{
		        
					header('Location: '.URL_FRONTEND.ERROR_CONEXION_BD);
		            
	            }
	            
				exit();
	
	        }
			//CAMBIANDO A UTF-8 "ESPAÑOL"
		    $lang=$this->database;
		    $lang->query('SET NAMES utf8');
		    return $this->database;
		}
	}

	public function query($sql) {
		
		$prepare = $this->prepareStatement($sql);
						
        if(empty($sql) OR $prepare->errno>0) {
	        
            return false;
        }
        
		$revisar = parent::revisarSql($sql);
        
        	if($revisar === true){
        
				$this->sql = $sql;
			}
        
        return true;
    }


	public function ultimoId() {
	//ULTIMO ID INSERTADO

		$query = $this->database->insert_id;
			
		return $query;
	}
	
	
	public function prepareStatement($sql) {
	//ULTIMO ID INSERTADO

		$query = $this->database->prepare($sql);
			
		return $query;
	}
	
	public function numRows() {
	//NÚMERO DE FILAS
		$mysqli = $this->database;
		$query  = $mysqli->query($this->sql);
		$rows   = $query->num_rows;
			
		return $rows;
	}
	
	public function rows() {
	//LISTAR TODOS
		$mysqli = $this->database;
		$query = $mysqli->query($this->sql);
		$respuesta = false;
		
		try {

			if($query){
				
				if($query->num_rows>0){
					
					while($fila= $query->fetch_array(MYSQLI_BOTH)){
						$arr[]=$fila;
				}
					
				return $arr;
					
				}else{
					
					return false;
										
				}
			}else{
				       
				throw new Exception('No se pudo ejecutar la consulta a la base de datos.');
	                
				return false;
				
			}
			
		}catch(Exception $e) {
	        
            $this->enviarReporte($e->getMessage());
            
        }
	
	}
	
	public function row() {
	//LISTAR UNO
			
		 try {
			
			$mysqli = $this->database;
			
            $resulset  = $mysqli->query($this->sql);
                        
            if(!$resulset){
	            
                throw new Exception('No se pudo ejecutar la consulta a la base de datos.');
                
                return false;
                
            }else{
	            
				if($resulset->num_rows>0){
					
					$arr = $resulset->fetch_array(MYSQLI_BOTH);
					
					return $arr;
					
				}else{
					
					
					return false;
				}	
				
			return true;

            }
			
        }catch(Exception $e) {
	        
            $this->enviarReporte($e->getMessage());
            
            return false;
            
        }
		
	}
	
	public function debug($case=1){
		
		if(isset($this->sql)){
			
			switch($case){
				
				case 1:
				
				echo $this->sql;
				
				break;
				
				case 2:
				
				print_r($this->sql);
				
				break;
				
				case 3:
				
				var_dump($this->sql);
				
				break;
			}
			
		}else{
			
			echo "Sin Consulta";
		}
		
	}
	
    public function execute() {
 
        try {
			
			$mysqli = $this->database;
			
            $resulset  = $mysqli->query($this->sql);
            
            if(!$resulset) {
                throw new Exception('No se pudo ejecutar la consulta a la base de datos.');
                
                return false;
            }else{

			return true;
			
			}
			
        }catch(Exception $e) {
	        
            $this->enviarReporte($e->getMessage());
            
        }
    }
	
	public function escape($var) {
		
		$res = $this->database->real_escape_string($var);
		
		return $res;
		
	}
	
	
	private function enviarReporte($msg){

        // Multiples Receptores
        $to = ADMIN_REPORT;

        // Subjects
        $subject = 'CloudSec: '.$msg;

        // Mensaje
        $message = '
            <html>
            <head>
              <title>Alert :'.$msg.'</title>
              <style>
              body, table, td{
                font-family: Arial;
                font-size: 12px;
              }
              </style>
            </head>
            <body>
              <table>
                <tr>
                    <td width="60">Fecha</td>
                    <td>'.date('Y-m-d H:i:s').'</td>
                  </tr>
                  <tr>
                    <td>IP</td>
                    <td>'.$_SERVER['REMOTE_ADDR'].'</td>
                  </tr>
                  <tr>
                    <td>URL</td>
                    <td>'.$_SERVER['REQUEST_URI'].'</td>
                  </tr>
                  <tr>
                    <td>MSG</td>
                    <td>'.$msg.'</td>
                  </tr>
                  <tr>
                    <td>SQL</td>
                    <td>'.$this->sql.'</td>
                  </tr>
                  <tr>
                    <td>DEBUG TRACE</td>
                    <td>'.print_r(debug_backtrace(),true).'</td>
                  </tr>

                  <tr>
                    <td valing="top">Acciones</td>
                    <td valing="top">
                        <a href="'.URL_FRONTEND.'secure_blockip/'.str_replace(".", "_", $_SERVER['REMOTE_ADDR']).'/" target="_blank">Bloquear IP</a><br /><br />
                        <a href="http://whatismyipaddress.com/ip/'.$_SERVER['REMOTE_ADDR'].'" target="_blank">Ver datos de IP</a><br />
                    </td>
                  </tr>
               </table>
               <br />
               <table>
                <tr>
                    <td>
                    Datos desde el Server:
                    <pre>
                    '.print_r($_SERVER, true).'
                    </pre>
                    </td>
                </tr>
              </table>
            </body>
            </html>
            ';

        // Envío HTML mail, Content-type header
        $headers = 'MIME-Version: 1.0'."\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";

        // Headers
        $headers .= 'From: Apptec WebServer <secure@cloudsec.cl>'."\r\n";

        // Mail 
        mail($to, $subject, $message, $headers);
    }
    
    function __destruct() {
	//Destrucción de Conexión
        @mysqli_close($this->database);
    }   
 
	
}

?>