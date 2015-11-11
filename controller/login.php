<?php
	
 class Login extends Controller {
	
		
	public function index() {
		
		
		if(isset($this->request->get['var1']) == 'exit'){
			
			$usuario = $this->load->model("Usuario");
			
			$usuario->desconectar();

			
		}	
	
		if(isset($_SESSION['id_usuario'])){
			
			$this->system->redirect("home/");
			
		}
		
		if(isset($this->request->post['email_usuario']) && isset($this->request->post['pass_usuario'])){
							
				$usuario = $this->load->model("Usuario");
				
				$login = $usuario->login($this->request->post['email_usuario'],$this->request->post['pass_usuario']);	
	
				$output['login'] = $login;
					
				if($login == true){
						
					$this->system->redirect("home/");
						
				}
		}
		
					$output['null'] = null;

			
			$vista = TEMPLATE."{$_SESSION['menu']}.php";

		$this->render($vista,$output);

	}
	
		
	public function out(){
			
			$usuario = $this->load->model("Usuario");
			
			$usuario->desconectar();
			
			$this->system->redirect("login/");
		
	}	
		
	
}

?>