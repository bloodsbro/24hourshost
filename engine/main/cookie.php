<?php

class Cookie {	
	public $data = array();
				
	public function __construct() {
		$this->data = $_COOKIE;
	}
		
	public function set($key, $value) {
		setcookie($key, $value, time() + 60 * 60 * 24 * 30 * 12, "/");
	}
		
	public function remove($key) {
		setcookie($key, null, time() - 3600, "/"); 
	}
}
?>
