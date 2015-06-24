<?php 
define('__ROOT__', dirname(__FILE__));
//require_once(__ROOT__.'/controllers/playersc.php'); 
require_once(__ROOT__.'/models/connection.php');
require_once(__ROOT__.'/models/AdminM.php');
session_start();
$db = new DBConnection();
$PM = new AdminM($db);

if (!isset($_SESSION['login_admin']) || $_SESSION['login_admin'] != 1) {
	die("You are not an admin! ");	
}
if(isset($_POST) && isset($_POST['submit'])) {
	$pid = $_POST['PID'];
	$name = $_POST['user'];
	$cash = $_POST['cash'];
	$bank = $_POST['bank'];
	$cop = $_POST['cop'];
	$don = $_POST['donate'];
	$med = $_POST['medic'];
	$adm = $_POST['admin'];
	$check = $PM->UpdateUser($pid,$bank,$cash,$cop,$med,$adm,$don,$name);
	if($check) {
		header('Location: editplayer.php?id='.$pid);
	} else { 
		die($check);
	
	}
}

?>