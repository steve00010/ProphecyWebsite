<?php
define('__ROOT__', dirname(__FILE__));
//require_once(__ROOT__.'/controllers/playersc.php'); 
require_once(__ROOT__.'/models/connection.php');
require_once(__ROOT__.'/models/AdminM.php');
session_start();

if (!isset($_SESSION['login_admin']) || $_SESSION['login_admin'] != 1) {
	die("You are not an admin! ");	
}
if(!isset($_GET['id'] )|| !ctype_digit($_GET['id'])) {
	die("No id specified");
}



$pid = $_GET['id'];
$db = new DBConnection();
$PM = new AdminM($db);


$row = $PM->GetUser($pid);
function secondsToTime($seconds) {
    $dtF = new DateTime("@0");
    $dtT = new DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%ad:%hh:%im');
}
include "header.php";
?>
  <div class="container basic-set marketing" >

  <img src="images/top_18.png" alt="" height="8" width="671">
	<div style="padding:0px 4px 0px 17px;">
		<h2>Welcome <?php echo $_SESSION['login_user']; ?></h2>
				<form name="update"action="updateplayer.php"  method='post'>
		<table class="table">
			<thead>
			<tr>
				<th>Name</th>
				<th>Cash</th>
				<th>Bankacc</th>
				<th>Cop Level</th>
				<th>Donator Level</th>
				<th>Medic Level</th>
				<th>Admin level</th>
			</tr>
			</thead>
		<tbody>

		<tr>
		<input type="hidden" name="PID" value="<?php echo $pid ?>" />
		
		<td><input type="text" name="user" value="<?php echo	$row['name']; ?>" />
		
		</td><td ><input type="number"  style="width: 120px;" name="cash" min="0" value="<?php echo	$row['cash'];  ?>">
		
		</td><td ><input type="number"  style="width: 120px;" name="bank" min="0" value="<?php echo	$row['bankacc'];  ?>" />
		
		</td><td>
		<select name="cop">
		<?php for($i=0;$i<8;$i++) {
			if($i == $row['coplevel']) {
			echo "<option selected=selected>".$i."</option>";
						}
			else {
				echo "<option>".$i."</option>";
			}
			} 
		?></select>
		
		</td><td >		
		<select name="donate">
		<?php for($i=0;$i<6;$i++) {
			if($i == $row['donatorlvl']) {
			echo "<option selected=selected>".$i."</option>";
			}
			else {
				echo "<option>".$i."</option>";
			}
			} 
		?></select>
		
		</td><td 	>	
		<select name="medic">
		<?php for($i=0;$i<6;$i++) {
			if($i == $row['mediclevel']) {
			echo "<option selected=selected>".$i."</option>";
						}
			else {
				echo "<option>".$i."</option>";
			}
			} 
		?></select>
		
		</td><td >		
		<select name="admin">
		<?php for($i=0;$i<6;$i++) {
			if($i == $row['adminlevel']) {
			echo "<option selected=selected>".$i."</option>";
						}
			else {
				echo "<option>".$i."</option>";
			}
			} 
		?></select></td>
		</tr>
			
		
	
		</tbody>
		</table>
			<button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Update</button>
			</form>
		
	<br><br><br>
	<a class="btn btn-lg btn-primary btn-block" href="logout.php">Logout</a>
	</div>
	<img src="images/top_22.png" alt="" height="16" width="671">
</div>

<?php include "footer.php"; ?>
    
    