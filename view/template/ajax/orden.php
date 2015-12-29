<?php
	if($buscar)
	{
		$json=array('res'=>true,'msg'=>$buscar,'juego'=>$juego);
	}
	else
	{
		$json=array('res'=>false,'msg'=>'No se han encontrado ordenes de compra para su búsqueda.');
	}
	echo json_encode($json);	
?>