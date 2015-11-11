<?php
	if($buscar)
	{
		$json=array('res'=>true,'msg'=>$buscar);
	}
	else
	{
		$json=array('res'=>false,'msg'=>'No se han encontrado pedidos para su búsqueda.');
	}
	echo json_encode($json);	
?>