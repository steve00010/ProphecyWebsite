<?php

class DBConnection {

	private $db_host = 'localhost';
	private $db_user = 'root';
	private $db_pass = '1BottleOfBeer1';
	private $db_name = 'arma3life';
	public $conn;
	public function __construct() {
        $this->connect();
    }
	public function connect() {
		try {
			$this->conn = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name, $this->db_user, $this->db_pass);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
		}
		
	}
}




?>