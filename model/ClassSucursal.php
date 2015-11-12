<?php
class ClassSucursal extends Model { 
	
	public function verSucursal(){
			
		$sql = $this->db->query("SELECT * FROM sucursal WHERE ver_sucursal = '1' ");

		$exec =	$this->db->rows();	

	return $exec;
		
	}
	
	public function agregarSucursal($data){
		
		$sql = $this->db->query("INSERT INTO sucursal (nombre_sucursal, direccion_sucursal, telefono_sucursal, detalle_sucursal,sucursal_bodega, ver_sucursal) VALUES ('{$data['nombre']}','{$data['direccion']}','{$data['telefono']}','{$data['detalle']}','{$data['sucursal_bodega']}',1);");
				
		$exec = $this->db->execute();
		
		if($exec==true){		
			
			return true;
		}
		else
		{
			return false;
		}

	}

	public function modificaSucursal($id,$data){
		
		$sql = $this->db->query("UPDATE sucursal SET nombre_sucursal = '{$data['nombre']}', direccion_sucursal = '{$data['direccion']}', telefono_sucursal = '{$data['telefono']}', detalle_sucursal = '{$data['detalle']}' WHERE id_sucursal='{$id}';");
		
		$exec = $this->db->execute();
		
		if($exec==true){		
			
			return true;
		}
		else
		{
			return false;
		}

	}

	public function mostrarSucursal($id){
		
		$sql = $this->db->query("SELECT nombre_sucursal, direccion_sucursal, telefono_sucursal, detalle_sucursal FROM sucursal WHERE '{$id}'=id_sucursal;");
		
		$exec = $this->db->row();
		
		return $exec;
		
	}
}	
?>