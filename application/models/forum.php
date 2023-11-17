<?php

class forumModel extends Model {
	public function createforum($data) {
		$sql = "INSERT INTO `forum` SET ";
		$sql .= "user_id = '" . (int)$data['user_id'] . "', ";
		$sql .= "forum_title = '" . $data['forum_title'] . "', ";
		$sql .= "forum_text = '" . $data['forum_text'] . "', ";
		$sql .= "forum_date_add = NOW()";
		$this->db->query($sql);
		return $this->db->getLastId();
	}

	public function deleteforum($newid) {
		$sql = "DELETE FROM `forum` WHERE forum_id = '" . (int)$newid . "'";
		$this->db->query($sql);
	}
	
	public function updateforum($newid, $data = array()) {
		$sql = "UPDATE `forum`";
		if(!empty($data)) {
			$count = count($data);
			$sql .= " SET";
			foreach($data as $key => $value) {
				$sql .= " $key = '" . $this->db->escape($value) . "'";
				
				$count--;
				if($count > 0) $sql .= ",";
			}
		}
		$sql .= " WHERE `forum_id` = '" . (int)$newid . "'";
		$query = $this->db->query($sql);
		return true;
	}
	
	public function getforum($data = array(), $joins = array(), $sort = array(), $options = array()) {
		$sql = "SELECT * FROM `forum`";
		foreach($joins as $join) {
			$sql .= " LEFT JOIN $join";
			switch($join) {
				case "users":
					$sql .= " ON forum.user_id=users.user_id";
					break;
			}
		}
		
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
	public function getTotalforum($data = array()) {
		$sql = "SELECT COUNT(*) AS count FROM `forum`";
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
	
	public function getforumById($newid, $joins = array()) {
		$sql = "SELECT * FROM `forum`";
		foreach($joins as $join) {
			$sql .= " LEFT JOIN $join";
			switch($join) {
				case "users":
					$sql .= " ON forum.user_id=users.user_id";
					break;
			}
		}
		$sql .=  " WHERE `forum_id` = '" . (int)$newid . "' LIMIT 1";
		$query = $this->db->query($sql);
		return $query->row;
	}
}
?>
