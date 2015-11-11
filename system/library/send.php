<?php	
	
final class Send {

	public function setToCookie($name,$cookie){
		$this->name = $name;
		$this->cookie = $cookie;
	}

	public function post($url,$data){

		//Initiate cURL.
		$ch = curl_init();
		 
		//The JSON data.
		$jsonData = $data;
		 
		//Encode the array into JSON.
		//$jsonDataEncoded = json_encode($jsonData);
				 
		curl_setopt($ch, CURLOPT_URL,$url);
		
		//Tell cURL that we want to send a POST request.
		curl_setopt($ch, CURLOPT_POST, 1);
		 
		//Attach our encoded JSON string to the POST fields.
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

		
		$var = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 
		 if(!empty($this->name) AND !empty($this->cookie)){
		 
		 	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: ".$this->name."=".$this->cookie.""));

		 }
		 
		 //Set the content type to application/json
		//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
		 
		//Execute the request
		 $content  = curl_exec($ch);
		  
		 curl_close($ch);
		 
		 return $content;
		 
	 }


}

?>