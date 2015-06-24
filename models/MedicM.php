<?php

class MedicM {
	private $db;
	private $con;
	public function __construct(DBConnection $db) {
		$this->db=$db;
		$this -> con = $this->db->conn;
	}

	public function PPD($pid) {
		try {
			$stmt= $this->con->prepare("UPDATE players SET mediclevel=mediclevel+1 WHERE playerid = ?");
			if($stmt ->execute(array($pid))) {
				return true;
			}
			else  { return false; }
			
		}
		catch (PDOException $e) {
			print $e->getMessage();
		}
	}
	public function DPD($pid) {
		try {
			$stmt= $this->con->prepare("UPDATE players SET mediclevel= mediclevel-1 WHERE playerid = ?");
			if($stmt ->execute(array($pid))) {
				return true;
			}
			else  { return false; }
			
		}
		catch (PDOException $e) {
			print $e->getMessage();
		}
	}
	public function GetUserByName($username) {
		try {
			$stmt= $this->con->prepare("SELECT * FROM players where name LIKE ?");
			if($stmt ->execute(array("%".$username."%"))) {
			$stack = array();
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					array_push($stack,$row);
				}
				if(empty($stack)) { return false; }
				else { return $stack; }	
			}
		}
		catch (PDOException $e) {
			print $e->getMessage();
		}
		
	}
}



?>