<?php
	if($actualizaStock)
	{
		$json=array('res'=>true);
	}
	else
	{
		$json=array('res'=>false);
	}
	echo json_encode($json);	
?>