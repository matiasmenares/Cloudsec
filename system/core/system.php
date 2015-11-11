<?php
	
class Sys {

	function subir($uploaded,$size,$carpeta){

	}

	function enviarMail(){
		
	}
	
	function hoy(){
		
		$hoy = date("Y-m-d");
		
		return $hoy;
	}
	
	function hoyHora(){
		
		$hoy_hora = date("Y-m-d H:i:s");
		
		return $hoy_hora;
	}
	
	function hora(){
		
		$hora = date("H:i:s");
		
		return $hora;
	}
	
	public function logeado() {
	
		if(!isset($_SESSION['id_usuario']) || empty($_SESSION['id_usuario'])){
			
			$this->redirect("login/");
	   
	   	}
	}
	
	public function redirect($url, $status = 302) {
		
		header('Location: ' .URL_FRONTEND. str_replace(array('&amp;', "\n", "\r"), array('&', '', ''), $url), true, $status);
		
		exit();
		
	}
	
	public function notify($clase, $titulo, $mensaje){
		switch($clase){
			
			case 1:
				$this->notify['tipo']='success';
				$this->notify['icono']='check';
				$this->notify['color']='green';
				$this->notify['fondo']='#f56954';
				break;
			case 2:
				$this->notify['tipo']='danger';
				$this->notify['icono']='ban';
				$this->notify['color']='red-thunderbird';
				$this->notify['fondo']='#f56954';
				break;
		}
		
		$this->notify['titulo']=$titulo;
		$this->notify['mensaje']=$mensaje;
		
	}
	
	public function resize($image_name,$new_width,$new_height,$uploadDir,$moveToDir){
				
		    $path = $uploadDir . '/' . $image_name;
		
		    $mime = getimagesize($path);
		
		    if($mime['mime']=='image/png'){ $src_img = imagecreatefrompng($path); }
		    if($mime['mime']=='image/jpg'){ $src_img = imagecreatefromjpeg($path); }
		    if($mime['mime']=='image/jpeg'){ $src_img = imagecreatefromjpeg($path); }
		    if($mime['mime']=='image/pjpeg'){ $src_img = imagecreatefromjpeg($path); }
		
		    $old_x          =   imageSX($src_img);
		    $old_y          =   imageSY($src_img);
		
		    if($old_x > $old_y) 
		    {
		        $thumb_w    =   $new_width;
		        $thumb_h    =   $old_y*($new_height/$old_x);
		    }
		
		    if($old_x < $old_y) 
		    {
		        $thumb_w    =   $old_x*($new_width/$old_y);
		        $thumb_h    =   $new_height;
		    }
		
		    if($old_x == $old_y) 
		    {
		        $thumb_w    =   $new_width;
		        $thumb_h    =   $new_height;
		    }
		
		    $dst_img        =   ImageCreateTrueColor($thumb_w,$thumb_h);
		
		    imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 
		
		
		    // New save location
		    $new_name=explode(".",$image_name);
		    $new_thumb_loc = $moveToDir . $new_name[0]."-".$new_width."x".$new_height.".".$new_name[1];
		
		    if($mime['mime']=='image/png'){ $result = imagepng($dst_img,$new_thumb_loc,8); }
		    if($mime['mime']=='image/jpg'){ $result = imagejpeg($dst_img,$new_thumb_loc,80); }
		    if($mime['mime']=='image/jpeg'){ $result = imagejpeg($dst_img,$new_thumb_loc,80); }
		    if($mime['mime']=='image/pjpeg'){ $result = imagejpeg($dst_img,$new_thumb_loc,80); }
		
		    imagedestroy($dst_img); 
		    imagedestroy($src_img);
		
		    return $result;
		}
		
		public function fechaCL($fecha,$separador){
			/* HECHO POR: Matias Harding */
			
			$string = "d".$separador."m".$separador."Y";
			$result = date($string,strtotime($fecha));
			
			return $result;	
		
		}
}



?>
