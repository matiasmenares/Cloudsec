<?php	
final class Css {
	
	public function setCss($dir=null){
		
		if($dir != null){

		}else{
			$directorio = opendir(TEMPLATE."css/");
			while ($archivo = readdir($directorio)){
				if (is_dir($archivo)){
						 $archivo;
				}elseif(file_exists(TEMPLATE."css/".$archivo)){
					$out[] =  "<link href='".URL_VIEW."css/".$archivo."' rel='stylesheet' type='text/css' /> \n";
				}
			}
		}
		return $out;
	}

}

?>