<?php

class CopM {
	private $db;
	private $con;
	public function __construct(DBConnection $db) {
		$this->db=$db;
		$this -> con = $this->db->conn;
	}

	public function PPD($pid) {
		try {
			$stmt= $this->con->prepare("UPDATE players SET coplevel=coplevel+1 WHERE playerid = ?");
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
			$stmt= $this->con->prepare("UPDATE players SET coplevel=coplevel-1 WHERE playerid = ?");
			if($stmt ->execute(array($pid))) {
				return true;
			}
			else  { return false; }
			
		}
		catch (PDOException $e) {
			print $e->getMessage();
		}
	}
	public function PSW($pid) {
		try {
			$stmt= $this->con->prepare("UPDATE players SET swatlevel=swatlevel+1 WHERE playerid = ?");
			if($stmt ->execute(array($pid))) {
				return true;
			}
			else  { return false; }
			
		}
		catch (PDOException $e) {
			print $e->getMessage();
		}
	}
	public function DSW($pid) {
		try {
			$stmt= $this->con->prepare("UPDATE players SET swatlevel=swatlevel-1 WHERE playerid = ?");
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
			$stmt= $this->con->prepare("SELECT * FROM players where name LIKE ? AND playtime > 86400 ");
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