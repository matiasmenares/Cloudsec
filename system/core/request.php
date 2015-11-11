<?php	
final class Request {
	/**/
	private $data = array();
	
	public function __construct() {
		$this->get = $this->clean($_GET);
		$this->post = $this->clean($_POST);
		$this->files = $this->clean($_FILES);
	}
	
	public function debug($case=1) {
		
		if(!empty($this->post) OR !empty($this->get) OR !empty($this->files)){
			
			switch($case){
				
				case 1:
				
				echo $this->post."<br/>";
				echo $this->get."<br/>";
				echo $this->files."<br/>";

				break;
				
				case 2:
				
				print_r($this->post);
				print_r($this->get);
				print_r($this->files);

				break;
				
				case 3:
				
				var_dump($this->post);
				var_dump($this->get);
				var_dump($this->files);
				
				break;
				
			}
			
		}else{
			
			echo "Sin Variables";
			
		}
		
	}
	
	public function clean($var){
		
		return $var;
		
	}	
}

?>