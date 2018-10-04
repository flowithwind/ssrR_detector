<?php

class VultrProvider {

	private $config = null;
	private $ch = null;

	public function __construct($config){
		if(!isset($config['api_key']) || $config['api_key'] == ''){
			print("api_key is not exist or empty: ". json_encode($config));
			return ;
		}
		$this->config = $config;

		return ;
	}

/*
	public function __call(string $name, array $args){
		if($config == null ){printf(" config is null");return -1;}
		if ($ch == null) {
			$ch = curl_init($config['base_uri']);
		}

		$url = $config['base_url'] . "/v1/" . 
		

		
	}
*/

	public function baseAPI($path, $method = "GET", $args = array()){

		$url = 	rtrim($this->config['base_uri'],'/') . $path ."?api_key=". $this->config['api_key'];
		if ($this->ch == null) {
			$this->ch = curl_init();
		}
		curl_setopt($this->ch , CURLOPT_USERAGENT, "f vulter client");
		
		curl_setopt($this->ch, CURLOPT_URL, $url);
		curl_setopt($this->ch, CURLOPT_HEADER, 0);
		curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 0);
		curl_setopt($this->ch, CURLOPT_VERBOSE, 0);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false); 
		curl_setopt($this->ch, CURLOPT_SSLVERSION,CURL_SSLVERSION_TLSv1); // verify ssl version 2 or 3
		curl_setopt($this->ch, CURLOPT_HTTPHEADER , array('Accept: application/json'));

		switch ($method) {
			case "POST":
				curl_setopt($this->ch , CURLOPT_POSTFIELDS, http_build_query($args));
				curl_setopt($this->ch , CURLOPT_POST , true);
				break;
			case "GET":
				curl_setopt($this->ch , CURLOPT_URL, $url. "&" . http_build_query($args));
				break;
		}

		return $this->ch;
	}
	public function serverList(){
		$this->baseAPI("/v1/server/list");
		$result = curl_exec($this->ch);
		printf("serverList result:$result");
		return $result;
	}
	public function osList(){
		$this->baseAPI("/v1/os/list");
		$result = curl_exec($this->ch);
		printf("osList result:$result");
		return $result;
		
	}
	public function serverDestroy($subid){
		$this->baseAPI("/v1/server/destroy", "POST", array('SUBID' => $subid));
		$result = curl_exec($this->ch);
		printf("serverDestroy result:$result");
		return $result;

	}

	public function serverCreate(){
		$this->baseAPI("/v1/server/create", 'POST', array(
			'SNAPSHOTID' => '9c55b7848f841',
			'DCID' => 40,  //Japan
			'VPSPLANID' => 201, //型号  $5/mo
		));
		$result = curl_exec($this->ch);
		printf("servercreate result:$result");
		return $result;
	}
}
