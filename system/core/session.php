<?php	
final class Session {
	/**
	@param $_SESSION	
	**/
	public function __construct() {
		if (!session_id()) {
			ini_set('session.use_only_cookies', 'On');
			ini_set('session.use_trans_sid', 'Off');
			ini_set('session.cookie_httponly', 'On');

			session_set_cookie_params(0, '/');
			session_start();
		}

		$this->data =& $_SESSION;
	}
	
	public function destroy($key){
		unset($_SESSION[$key]);
		return true;
	}
	
	public function destroyAll(){
		session_destroy();
		return true;
	}
	
	public function debug($case=2,$key=null){
		
		switch($case){
			case 1:
				if($key!=null){
					if(!empty($_SESSION)){
						print_r($_SESSION[$key]);
					}else{
						echo "Sessions Array is empty";
					}
				}else{
					echo "Specifies a key";
				}
			break;
			case 2:
				if(!empty($_SESSION)){
					print_r($_SESSION);
				}else{
					echo "Sessions Array is empty";
				}
			break;
		}
	}
}
?>