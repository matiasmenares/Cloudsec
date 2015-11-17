<?php

class Secure {
	
	 private static $llave_privada = '36ec7fefb730d8d68481b722a19fd094';
	 
	 
	function revisarSql($sql){
		 
		 return true;
		 
	 }
	 
	private function alerta($msg){

        // Multiples Receptores
        $to = 'matias.menares@apptec.cl';
        $to .= ',dejaaymts@gmail.com';

        // Subjects
        $subject = 'Apptec: Alerta en Base de Datos';

        // Mensaje
        $message = '
            <html>
            <head>
              <title>Apptec.cl : Alerta en Base de Datos</title>
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
                    <td valing="top">Acciones</td>
                    <td valing="top">
                        <a href="http://www.inforemate.cl/secure/blockIp.php?id='.str_replace(".", "_", $_SERVER['REMOTE_ADDR']).'" target="_blank">Bloquear IP</a><br /><br />
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
        $headers .= 'From: Apptec WebServer <secure@apptec.cl>'."\r\n";

        // Mail 
        mail($to, $subject, $message, $headers);
    }

	 
	 
	public function encript($string) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr(self::$llave_privada, ($i % strlen(self::$llave_privada))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
   }
   				
   	function desencriptar($string) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr(self::$llave_privada, ($i % strlen(self::$llave_privada))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
   }
   
   
   	public function encrypt($value) {
	   	
	   	$MCRYPT_RIJNDAEL_256="123";
		return strtr(base64_encode(mcrypt_encrypt($MCRYPT_RIJNDAEL_256, hash('sha256', $this->key, true), $value, MCRYPT_MODE_ECB)), '+/=', '-_,');
	}

	public function decrypt($value) {
			   	$MCRYPT_RIJNDAEL_256="123";

		return trim(mcrypt_decrypt($MCRYPT_RIJNDAEL_256, hash('sha256', $this->key, true), base64_decode(strtr($value, '-_,', '+/=')), MCRYPT_MODE_ECB));
	}
   
  function logeado()// SESION DE USUARIO == NULL NO DEJA ENTRAR
   	{
   if(!$_SESSION['id_usuario'] || empty($_SESSION['id_usuario']))

  {
   exit ('<meta http-equiv="Refresh" content="0;url=index.php"> ');
   
  }
  
 if(! $_SESSION['id_usuario'] || empty($_SESSION['id_usuario']))
  {
   exit ('<meta http-equiv="Refresh" content="0;url=inactivo"> ');
   
  }

 	 }

}



/*
function limpiarCadena($valor)
{
  //Limpiamos codigo malicioso reemplazando las cadenas de strings a nada ""

  //SQLi
  //$valor = strtoupper ($valor);
  //$valor = real_escape_string($valor);

  $valor = str_ireplace("SELECT","",$valor);
  $valor = str_ireplace("COPY","",$valor);
  $valor = str_ireplace("DELETE","",$valor);
  $valor = str_ireplace("DROP","",$valor);
  $valor = str_ireplace("DUMP","",$valor);
  $valor = str_ireplace(" OR ","",$valor);
  $valor = str_ireplace("%","",$valor);
  $valor = str_ireplace("LIKE","",$valor);
  $valor = str_ireplace("--","",$valor);
  $valor = str_ireplace("^","",$valor);
  $valor = str_ireplace("[","",$valor);
  $valor = str_ireplace("]","",$valor);
  $valor = str_ireplace("\\","",$valor);
  $valor = str_ireplace("!","",$valor);
  $valor = str_ireplace("¡","",$valor);
  $valor = str_ireplace("?","",$valor);
  $valor = str_ireplace("=","",$valor);
  $valor = str_ireplace("&","",$valor);

  // XSS 

  $valor = str_replace("<script>","script",$valor ); //remplaza la candena "<script>" por "script".
  $valor = str_replace("<SCRIPT>","script",$valor); //remplaza la candena "<SCRIPT>" por "script".
  $valor = str_replace("</script>","script",$valor); //remplaza la candena "</script>" por "script".
  $valor = str_replace("</SCRIPT>","script",$valor); //remplaza la candena "</SCRIPT>" por "script".
  $valor = str_replace("prompt","",$valor); //remplaza la cadena "prompt por "(nada)".
  $valor = str_replace("=","",$valor); //remplaza la cadena "=" por "(nada)".
  $valor = str_replace("(/","",$valor); //remplaza la cadena "(/" por "(nada)".
  $valor = str_replace("'","",$valor); //remplaza la cadena "'" por "(nada)".
  $valor = str_replace("<marquee>","",$valor);
  $valor = str_replace("</marquee>","",$valor);
  $valor = str_replace("<","",$valor);
  $valor = str_replace(">","",$valor);
  
  //XSS Avanzado

  $valor = str_replace("</Script>","",$valor);
  $valor = str_replace("<ScRipt>","",$valor);
  $valor = str_replace("<=script>","",$valor);
  $valor = str_replace("alert","",$valor);
  $valor = str_replace("promppromptt","",$valor);
  $valor = str_replace("<<script>>","",$valor);
  $valor = str_replace("</script >","",$valor);

  $valor = trim($valor);
    $valor = htmlspecialchars($valor);
    $valor = str_replace(chr(160),'',$valor);

  return $valor;
}

//Enviar variables a funcion limpiar GET Y POST


$input_arr = array(); 
foreach ($_POST as $key => $input_arr) 
{ 
  $_POST[$key] = addslashes(limpiarCadena($input_arr)); 
}
 
$input_arr = array(); 
foreach ($_GET as $key => $input_arr) 
{ 
  $_GET[$key] = addslashes(limpiarCadena($input_arr)); 
}
*/



?>