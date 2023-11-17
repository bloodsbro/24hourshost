<?php
class mtasaQuery extends QueryBase {
	public function connect($ip, $port) {
		$this->ip = $ip;
		$this->port = $port;
	}
	
	public function disconnect() {
	}
	
	private function sendPacket() {
	}
	
	public function getInfo() {	
		require_once 'lgsl/lgsl_protocol.php';
		ini_set('default_socket_timeout', '10');
		$server = lgsl_query_live('mta', $this->ip, $this->port, $this->port + 123, $this->port, 'sep');
		if(empty($server['s']['name'])) {
			$data['hostname'] = 'Нет данных - 24HoursHost';
		} else {
			$data['hostname'] = htmlspecialchars(mb_convert_encoding($server['s']['name'], 'UTF-8', 'WINDOWS-1251'));
		}
		if(empty($server['s']['map'])) {
			$data['mapname'] = 'Нет данных - 24HoursHost';
		} else {
			$data['mapname'] = htmlspecialchars(mb_convert_encoding($server['s']['map'], 'UTF-8', 'WINDOWS-1251'));
		}
		if(empty($server['e']['gamemode'])) {
			$data['gamemode'] = 'Нет данных - 24HoursHost';
		} else {
			$data['gamemode'] = htmlspecialchars(mb_convert_encoding($server['e']['gamemode'], 'UTF-8', 'WINDOWS-1251'));
		}
		if(empty($server['s']['players'])) {
			$data['players'] = '0';
		} else {
			$data['players'] = $server['s']['players'];
		}
		if(empty($server['s']['playersmax'])) {
			$data['maxplayers'] = '0';
		} else {
			$data['maxplayers'] = $server['s']['playersmax'];
		}
		return $data;
    }
}
?>