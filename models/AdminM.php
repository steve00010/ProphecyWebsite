<?php

class AdminM {
	private $db;
	private $con;
	public function __construct(DBConnection $db) {
		$this->db=$db;
		$this -> con = $this->db->conn;
	}
	public function GetUserByName($username) {
		try {
			$stmt= $this->con->prepare("SELECT * FROM players where name LIKE ? ");
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
	public function UpdateUser($pid,$bank,$cash,$cop,$medic,$admin,$donate,$name) {
		try {
			$stmt= $this->con->prepare("UPDATE players SET name=?, cash=?, bankacc=?, coplevel=?, mediclevel=?, donatorlvl=?, adminlevel=? WHERE playerid=?");
			if($stmt ->execute(array($name,$cash,$bank,$cop,$medic,$donate,$admin,$pid))) {
				if($stmt) {
					return true;
				} else  { return false; }
			}
		}
		catch (PDOException $e) {
			print $e->getMessage();
		}
	}
	public function GetUser($pid) {
		try {
			$stmt= $this->con->prepare("SELECT * FROM players where playerid = ?");
			if($stmt ->execute(array($pid))) {
				if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					return $row;
				} else  { return false; }
			}
		}
		catch (PDOException $e) {
			print $e->getMessage();
		}
		
	} 
	
	public function GetBounty($pid) {
		try {
			$stmt= $this->con->prepare("SELECT bounty FROM wanted where pid=?");
			if($stmt ->execute(array($pid))) {
				if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					return $row;
				} else  { return false; }
			}
		}
		catch (PDOException $e) {
			print $e->getMessage();
		}	
	}
	public function CheckStatus($pid) {
		// CHECK IF STEAM ID IS EMPTY
		if (!isset($pid) || empty($pid)){
			return false;
		}
		// CHECK IF STEAM ID IS ONLY NUMERIC
		if(ctype_digit($pid) == false){
			
			return false;
		}
		else{
			return true;
		}
	}
}



?>