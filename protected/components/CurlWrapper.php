<?php

class CurlWrapper
{

	private $user = '';
	private $password = '';
	private $optionsArray = array();

	function __construct($args = array())
	{
		if (count($args) > 0) {
			if (isset($args['user'])) {
				$this->user = $args['user'];
			}
			if (isset($args['password'])) {
				$this->password = $args['password'];
			}
		}
	}

	private function getCURLConnection()
	{
		$ch = curl_init();
		if(!empty($this->user) && !empty($this->password)){
			curl_setopt($ch, CURLOPT_USERPWD, $this->user . ':' . $this->password);
		}
		curl_setopt_array($ch, $this->optionsArray);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		return $ch;
	}

	public function setcURLOptionsArray($opts){
		$this->optionsArray = $opts;
	}

	public function doGet()
	{
		$ch = $this->getCURLConnection();
		$curl_response = curl_exec($ch);

		if ($curl_response === false) {
			$error_info = curl_getinfo($ch);
			curl_close($ch);
			return array('message' => 'error occured during curl exec. Additioanl info: ' . var_dump($error_info));
		}
		curl_close($ch);
		return $curl_response;
	}

	public function doPost($data)
	{
		$ch = $this->getCURLConnection();
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$curl_response = curl_exec($ch);
		if ($curl_response === false) {
			$error_info = curl_getinfo($ch);
			curl_close($ch);
			return array('message' => 'error occured during curl exec. Additioanl info: ' . var_dump($error_info));
		}
		curl_close($ch);
		return $curl_response;
	}

	public function doPut($data)
	{
		$ch = $this->getCURLConnection();
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$curl_response = curl_exec($ch);
		if ($curl_response === false) {
			$error_info = curl_getinfo($ch);
			curl_close($ch);
			return array('message' => 'error occured during curl exec. Additioanl info: ' . var_dump($error_info));
		}
		curl_close($ch);
		return $curl_response;
	}

	public function doDelete()
	{
		$ch = $this->getCURLConnection();
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		$curl_response = curl_exec($ch);
		if ($curl_response === false) {
			$error_info = curl_getinfo($ch);
			curl_close($ch);
			return array('message' => 'error occured during curl exec. Additioanl info: ' . var_dump($error_info));
		}
		curl_close($ch);
		return $curl_response;
	}
}
