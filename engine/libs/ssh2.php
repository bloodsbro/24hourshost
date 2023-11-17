<?php

class ssh2Library {
	public function connect($hostname, $username, $port = 4815) {
		if(str_contains($hostname, ":")) {
			[$hostname, $port] = explode(":", $hostname, 2);
		}

		if($link = ssh2_connect($hostname, $port, array('hostkey'=>'ssh-rsa'))) {
			if(ssh2_auth_pubkey_file($link, $username, '/etc/ssh/' . $hostname . '.pub', '/etc/ssh/' . $hostname . '.key')) {
				return $link;
			}
		}

		exit("Ошибка: Не удалось соединиться с сервером!");
	}
			
	public function execute($link, $cmd)
	{
		$stream = ssh2_exec($link, $cmd);
		stream_set_blocking($stream, true);
		$output = '';
		while ($get = fgets($stream)) {
			$output .= $get;
		}
		fclose($stream);
		return $output;
	}
	
	function get($link, $cmd) {		
		if($cmd) {
			$this->stream = ssh2_exec($link, $cmd);
			stream_set_blocking($this->stream, true);
		}
		$line = '';
		while($get = fgets($this->stream))
		$line.= $get;
		return $line;
	}
	
	public function disconnect($link) {
		ssh2_exec($link, "exit");
	}
}
?>
