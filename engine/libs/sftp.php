<?php

class sftpLibrary {
	public function connect($hostname, $username, $port) {
		if(is_readable(ENGINE_DIR . 'libs/seclib/Net/SFTP.php')) {
			set_include_path(ENGINE_DIR . 'libs/seclib');
			require_once(ENGINE_DIR . 'libs/seclib/Net/SFTP.php');
			require_once(ENGINE_DIR . 'libs/seclib/Crypt/RSA.php');
		} else {
			exit("Ошибка: Не удалось загрузить библиотеку для работы с sftp!");
		}

		$privateKey = new Crypt_RSA();
		$privateKey->loadKey(file_get_contents('/etc/ssh/' . $hostname . '.key'));

		$sftp = new Net_SFTP($hostname, $port);
		if ($sftp->login($username, $privateKey)) {
			return $sftp;
		}
		return 'Ошибка: Не удалось соединиться с сервером!';
	}
		
	public function open($sftp, $command) {
		return $sftp->get($command);
	}

	public function write($sftp, $command, $file) {
		return $sftp->put($command, $file);
	}

	public function files($sftp, $path) {
		return @$sftp->nlist($path);
	}
		
	public function get($sftp, $path, $fun) {
		return @$sftp->$fun($path);
	}
}
?>
