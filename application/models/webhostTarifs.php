<?

class webhostTarifsModel extends Model {
	public function createTarif($data) {
		$sql = "INSERT INTO `web_tarifs` SET ";
		$sql .= "`tarif_name` = '" . $data['tarif_name'] . "', ";
		$sql .= "`package` = '" . $data['package'] . "', ";
		$sql .= "`tarif_price` = '" . $data['tarif_price'] . "', ";
		$sql .= "`tarif_status` = '" . $data['tarif_status'] . "'";
		$this->db->query($sql);
		$return=$this->db->getLastId();		
		return $return;
	}

	public function deleteTarif($tarifid) {
		$sql = "DELETE FROM `web_tarifs` WHERE tarif_id = '" . (int)$tarifid . "'";
		$this->db->query($sql);
	}
	
	public function blockTarif($tarifid) {
		$sql = "DELETE FROM `web_tarifs` WHERE tarif_id = '" . (int)$tarifid . "'";
		$this->db->query($sql);
	}
	
	public function updateTarif($tarifid, $data = array()) {
		$sql = "UPDATE `web_tarifs`";
		if(!empty($data)) {
			$count = count($data);
			$sql .= " SET";
			foreach($data as $key => $value) {
				$sql .= " $key = '" . $this->db->escape($value) . "'";
				
				$count--;
				if($count > 0) $sql .= ",";
			}
		}
		$sql .= " WHERE `tarif_id` = '" . (int)$tarifid . "'";
		$query = $this->db->query($sql);
	}
	public function getTarifs($data = array(), $sort = array(), $options = array()) {
		$sql = "SELECT * FROM `web_tarifs`";
		if(!empty($data)) {
			$count = count($data);
			$sql .= " WHERE";
			foreach($data as $key => $value) {
				$sql .= " $key = '" . $this->db->escape($value) . "'";
				
				$count--;
				if($count > 0) $sql .= " AND";
			}
		}
		
		if(!empty($sort)) {
			$count = count($sort);
			$sql .= " ORDER BY";
			foreach($sort as $key => $value) {
				$sql .= " $key " . $value;
				
				$count--;
				if($count > 0) $sql .= ",";
			}
		}
		
		if(!empty($options)) {
			if ($options['start'] < 0) {
				$options['start'] = 0;
			}
			if ($options['limit'] < 1) {
				$options['limit'] = 20;
			}
			$sql .= " LIMIT " . (int)$options['start'] . "," . (int)$options['limit'];
		}
		$query = $this->db->query($sql);
		return $query->rows;
	}
	 
	public function getTarifById($tarifid) {
		$sql = "SELECT * FROM `web_tarifs` WHERE `tarif_id` = '" . (int)$tarifid . "' LIMIT 1";
		$query = $this->db->query($sql);
		return $query->row;
	}
	
	public function getTotalTarifs($data = array()) {
		$sql = "SELECT COUNT(*) AS count FROM `web_tarifs`";
		if(!empty($data)) {
			$count = count($data);
			$sql .= " WHERE";
			foreach($data as $key => $value) {
				$sql .= " $key = '" . $this->db->escape($value) . "'";
				
				$count--;
				if($count > 0) $sql .= " AND";
			}
		}
		$query = $this->db->query($sql);
		return $query->row['count'];
	}
}
?>
