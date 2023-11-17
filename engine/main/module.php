<?php

class Config {
	private $data = array();
	
	public function __construct() {
		if(is_readable(MODULE_DIR . 'setting.php')) {
			require_once(MODULE_DIR . 'setting.php');
			$this->data = array_merge($this->data, $config);
			return true;
		}
		exit('Ошибка: Не удалось загрузить файл конфигурации!');
	}
	
	public function __set($key, $val){
		$this->data[$key] = $val;
	}
	
	public function __get($key){
		if(isset($this->data[$key])){
			return $this->data[$key];
		}
		return false;
	}
}
?>
