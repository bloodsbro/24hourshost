<?php

class ValidateLibrary {
	public function firstname($firstname) {
		/*
			Разрешенные символы: А-Я а-я
			Длина: 2-16
		*/
		return preg_match("/^([А-ЯЁ]{1})([а-яё]{1,15})$/u", $firstname);
	}
	
	public function lastname($lastname) {
		/*
			Разрешенные символы: А-Я а-я
			Длина: 2-16
		*/
		return preg_match("/^([А-ЯЁ]{1})([а-яё]{1,15})$/u", $lastname);
	}
	
	public function check_for_number($str)
	{
		$lenght = strlen($str);
		$i = 0;

		if ($i < $lenght) {
			return true;
		}

		return false;
	}

	public function email($email) {
		return preg_match("/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/", $email);
	}
		public function domain($domain) {
		return preg_match("/[^\.\/]+\.[^\.\/]+$/", $domain);
	}

	public function password($password) {
		/*
			Разрешенные символы: A-Z a-z 0-9
			Длина: 6-32
		*/
		return preg_match("/^[a-zA-Z0-9,\.!?_-]{6,32}$/", $password);
	}
	
	public function password_web($password) {
		/*
			Разрешенные символы: A-Z a-z 0-9
			Длина: 8-32
		*/
		return preg_match("/^[a-zA-Z0-9,\.!?_-]{8,32}$/", $password);
	}
	
	public function password_web1($password) {
		return preg_match("/([0-9]+)/", $password);
	}
	
	public function password_web2($password) {
		return preg_match("/([a-z]+)/", $password);
	}
	
	public function accesslevel($accesslevel) {
		/*
			Разрешенные символы: 0-3
			Длина: 1
		*/
		if(0 > $accesslevel || $accesslevel > 3)
			return false;
		else
			return true;
	}
	
	public function userstatus($status) {
		/*
			Разрешенные символы: 0-1
			Длина: 1
		*/
		if(0 > $status || $status > 1)
			return false;
		else
			return true;
	}
	
	public function money($money) {
		/*
			Разрешенные символы: 0-9 и .
			Длина: 1
		*/
		return preg_match("/^([0-9]{1,10})(\.[0-9]{2})?$/", $money);
	}
	
	public function ip($ip) {
		/*
			Разрешенные символы: 0-9 и .
			Длина: 1
		*/
		return preg_match("/^([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})\.([0-9]{1,3})$/", $ip);
	}

	public function md5($md) {
		/*

			Разрешенные символы: a-f и 0-9
			Длина: 1
		*/
		return preg_match("/^([a-f0-9]{32})$/", $md);
	}
}
?>
