<?php
class valveQuery extends QueryBase {
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
		$server = lgsl_query_live('source', $this->ip, $this->port, $this->port, $this->port, 'sep');
		if(empty($server['s']['name'])) {
			$data['hostname'] = 'Нет данных - 24HoursHost';
		} else {
			$data['hostname'] = $server['s']['name'];	
		}
		if(empty($server['s']['map'])) {
			$data['mapname'] = 'Нет данных - 24HoursHost';
		} else {
			$data['mapname'] = $server['s']['map'];	
		}
		if(empty($server['e']['description'])) {
			$data['gamemode'] = 'Нет данных - 24HoursHost';
		} else {
			$data['gamemode'] = $server['e']['description'];	
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