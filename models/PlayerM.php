<?php

class PlayersM {
	private $db;
	private $con;
	public function __construct(DBConnection $db) {
		$this->db=$db;
		$this -> con = $this->db->conn;
	}
	public function GetUserByIP($ip) {
		try {
			$stmt= $this->con->prepare("SELECT * FROM players where ip = ?");
			if($stmt ->execute(array($ip))) {
				$stack = array();
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					array_push($stack,$row["playerid"]);
				}
				return $stack;
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
	public function GetTopTenTime() {
		try {
			$stmt= $this->con->prepare("SELECT name,playtime FROM players order by playtime DESC LIMIT 10");
			if($stmt ->execute()) {
				$stack = array();
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					array_push($stack,$row);
				}
				return $stack;
			}
		}
		catch (PDOException $e) {
			print $e->getMessage();
		}	
	}
	public function GetBounty($pid) {
		try {
			$stmt= $this->con->prepare("SELECT wantedBounty FROM wanted where wantedID=?");
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
	public function GetTopTenWanted() {
		try {
			$stmt= $this->con->prepare("SELECT wantedID, wantedName, wantedCrimes, wantedBounty FROM wanted ORDER BY wantedBounty DESC limit 10");
			if($stmt ->execute()) {
				$stack = array();
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					array_push($stack,$row);
				}
				return $stack;
			}
		}
		catch (PDOException $e) {
			print $e->getMessage();
		}
		
	}
	public function GetCivCars($pid) {
		try {
			$stmt= $this->con->prepare("SELECT * FROM vehicles where pid = ? and side='civ'");
			if($stmt ->execute(array($pid))) {
				$stack = array();
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					array_push($stack,$row["classname"]);
				}
				return $stack;
			}
			
		}
		catch (PDOException $e) {
			print $e->getMessage();
		}
	}
	public function GetCopCars($pid) {
		try {
			$stmt= $this->con->prepare("SELECT * FROM vehicles where pid = ? and side='cop'");
			if($stmt ->execute(array($pid))) {
				$stack = array();
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					array_push($stack,$row["classname"]);
				}
				return $stack;
			}
		}
		catch (PDOException $e) {
			print $e->getMessage();
		}
	}
	public function Login($user,$pass) {
		try {
			$pass1 = hash('sha256','GIeP2nX'.$pass);
			$stmt= $this->con->prepare("SELECT * FROM alc_login WHERE username=? AND password=?");
			if($stmt ->execute(array($user,$pass1))) {
				if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					return $row;
				} else  { 
					return false; 
				}
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