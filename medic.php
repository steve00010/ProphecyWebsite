<?php
define('__ROOT__', dirname(__FILE__));
//require_once(__ROOT__.'/controllers/playersc.php'); 
require_once(__ROOT__.'/models/connection.php');
require_once(__ROOT__.'/models/MedicM.php');
session_start();
$db = new DBConnection();
$PM = new MedicM($db);

if (!isset($_SESSION['login_medic']) || $_SESSION['login_medic'] != 1) {
	die("You are not the chief of police! ");	
}
$searched=false;
if (!empty($_POST)) {
		if(isset($_POST['PPD'])) {
			$PM->PPD($_POST['PID']);
		}
		if(isset($_POST['DPD'])) {
			$PM->DPD($_POST['PID']);
		}
		if(isset($_POST['PSW'])) {
			$PM->PSW($_POST['PID']);
		}
		if(isset($_POST['DSW'])) {
			$PM->DSW($_POST['PID']);
		}
		$info = $PM->GetUserByName($_POST['user']);
		$searched = true;
}
include "header.php";
?>
<div class="content">
  <img src="images/top_18.png" alt="" height="8" width="671">
	<div class="container">
		<h2>Welcome <?php echo $_SESSION['login_user']; ?></h2>
		<p>Here you can promote or demote people in the Medic Force</p>
		<p>Simply start by inputting their full username as it was when they last logged into the server. </p>	
		<form class="form-signin" method='post' action='medic.php'>
         
                    <input type="text" class="form-control" name='user' placeholder="Username" autofocus>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Search</button>
       </form>
		<?php
		if($searched) {
			if(!$info) { 
				echo 'Player by that name: "'.$_POST['user'].'" was not found!';
			} else {
			?>
			<br><br><br>
			<p>Players found!</p>
			<table>
			<tr><td>Ingame Name</td><td>Medic rank</td></tr>
			<?php 
			foreach($info as $found) { ?>
			<tr>
			<td><?php echo $found['name']?> </td>
			<td><?php 
				switch($found['mediclevel']) {
					default: echo "Not a medic!"; break;
					case 1: echo "Junior Medic"; break;
					case 3: echo "Medic"; break;
					case 5: echo "Chief Medic"; break;
				}?>
			</td>
			</tr></table>	
			<form action="medic.php"  method='post'>
				<input type="hidden" name="PID" value="<?php echo $found['playerid'] ?>" />
				<input type="hidden" name="user" value="<?php echo $found['name'] ?>" />
				<?php if($found['mediclevel'] !=5) { ?>
				<button class="btn btn-lg btn-primary btn-block" name="PPD" type="submit">Promote</button>
				<?php } if($found['mediclevel'] !=0) { ?>
				<button class="btn btn-lg btn-primary btn-block" name="DPD" type="submit">Demote</button>
				<?php }  ?>
			</form><br>
			<?php } ?>
			<?php
			}
		}
	?>
	<br><br><br>
	<a class="btn btn-lg btn-primary btn-block" href="logout.php">Logout</a>
	</div>
	<img src="images/top_22.png" alt="" height="16" width="671">
</div>

<?php include "footer.php"; ?>
    
    