<?php
define('__ROOT__', dirname(__FILE__));
//require_once(__ROOT__.'/controllers/playersc.php'); 
require_once(__ROOT__.'/models/connection.php');
require_once(__ROOT__.'/models/CopM.php');
session_start();
$db = new DBConnection();
$PM = new CopM($db);

if (!isset($_SESSION['login_cop']) || $_SESSION['login_cop'] != 1) {
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
		<p>Here you can promote or demote people from the police force or into SWAT</p>
		<p>Simply start by inputting their full username as it was when they last logged into the server. </p>	
		<div class="alert alert-success" role="alert">
      <strong>News:</strong><br> Been changed so players who do not have 24 hours playtime will not appear in search, to make it easier to find eligible players. <br>
	  If someone wants this removed just ask.
    </div>
		
		<form class="form-signin" method='post' action='cop.php'>
         
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
			<tr><td>In-game Name</td><td>Cop rank</td><td>SWAT </td><td>Playtime</td> </tr>
			<?php 
			foreach($info as $found) { ?>
			<tr>
			<td style="padding-right:7px;"><?php echo $found['name']?> </td>
			<td style="padding-right:7px;"><?php 
				switch($found['coplevel']) {
					default: echo "Not in the police force!"; break;
					case 1: echo "Cadet"; break;
					case 2: echo "Marshall"; break;
					case 3: echo "Corporal"; break;
					case 4: echo "Sergeant"; break;
					case 5: echo "Lieutenant"; break;
					case 6: echo "Captain"; break;
					case 7: echo "Chief"; break;
				}?>
			</td>
			<td style="padding-right:7px;"><?php 
				switch($found['swatlevel']) {
					default: echo "Not in the SWAT!"; break;
					case 1: echo "SWAT"; break;
					case 2: echo "SWAT Sniper"; break;
				}?>
			</td>
			<td style="padding-right:7px;">
				<?php echo secondsToTime($found['playtime']) ?>
			</td>
			</tr><tr>
			<form action="cop.php"  method='post'>
				<input type="hidden" name="PID" value="<?php echo $found['playerid'] ?>" />
				<input type="hidden" name="user" value="<?php echo $found['name'] ?>" />
				<?php if($found['coplevel'] !=7) { ?> <td style="padding-right:7px;">
				<button class="btn btn-lg btn-primary btn-block" name="PPD" type="submit">Promote in police</button> </td>
				<?php } if($found['coplevel'] !=0) { ?> <td style="padding-right:7px;">
				<button class="btn btn-lg btn-primary btn-block" name="DPD" type="submit">Demote in police</button> </td>
				<?php }  if($found['swatlevel'] !=2) {  ?> <td style="padding-right:7px;">
				<button class="btn btn-lg btn-primary btn-block" name="PSW" type="submit">Promote to SWAT</button> </td>
				<?php } if($found['swatlevel'] !=0) { ?> <td style="padding-right:7px;">
				<button class="btn btn-lg btn-primary btn-block" name="DSW" type="submit">Demote from SWAT</button> </td>
				<?php } ?>
			</form><br>
			<?php } ?>
			<?php
			}
		}
	?></tr></table>
	<br><br><br>
	<a class="btn btn-lg btn-primary btn-block" href="logout.php">Logout</a>
	</div>
	<img src="images/top_22.png" alt="" height="16" width="671">
</div>

<?php include "footer.php"; ?>
    
    