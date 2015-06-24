<?php
class DonateM {
	private $db;
	private $con;
	public function __construct(DBConnection $db) {
		$this->db=$db;
		$this -> con = $this->db->conn;
	}
	public function getlevel($pid) { 
		try {
			$stmt= $this->con->prepare("SELECT donatorlvl FROM players where playerid = ? ");
			if($stmt ->execute(array($pid))) {
				if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					return $row;
				} else  { return false; }
			}
		}
		catch (PDOException $e) {
			return $e->getMessage();
		}
	}
	public function getdonatetotal($pid) {
		try {
			$stmt= $this->con->prepare("SELECT total FROM donations where pid = ? ORDER BY total DESC LIMIT 1");
			if($stmt ->execute(array($pid))) {
				if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					return $row;
				} else  { return false; }
			}
		}
		catch (PDOException $e) {
			return $e->getMessage();
		}
	}
	public function logdonate($pid, $email, $amount,$total, $fname, $lname) {
	try {
			$stmt= $this->con->prepare("INSERT INTO donations (pid,email,amount,total,date,Firstname,Lastname) VALUES (?,?,?,?,now(),?,?)");
			if($stmt ->execute(array($pid,$email,$amount,$total,$fname,$lname))) {
				return true;
			}
			else  { return false; }
			
		}
		catch (PDOException $e) {
			return $e->getMessage();
		}
	}
	public function setdonate($pid,$level) {
	try {
			$stmt= $this->con->prepare("UPDATE players SET donatorlvl = ? WHERE playerid = ?");
			if($stmt ->execute(array($level,$pid))) {
				return true;
			}
			else  { return false; }
			
		}
		catch (PDOException $e) {
			return $e->getMessage();
		}
	}
	
	
	
	
}


?>