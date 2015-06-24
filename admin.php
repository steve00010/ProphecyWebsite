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
$searched=false;
if (!empty($_POST)) {
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
		<p>Here you can do some admin shit</p>
		<p>Simply start by inputting their full username as it was when they last logged into the server. </p>	
		<form class="form-signin" method='post' action='admin.php'>
         
                    <input type="text" class="form-control" name='user' placeholder="Username" autofocus>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Search</button>
       </form>
		<?php
		if($searched) {
			if(!$info) { 
				echo 'Player by that name: "'.$_POST['user'].'" was not found!';
			} else {
			?>
			<br>
			<p><?php echo sizeof($info); ?> Players found!</p>
			<table>
			<thead>
			<tr><th style="padding-right:9px;">Ingame Name</th><th style="padding-right:9px;">Current bank</th><th style="padding-right:9px;">Playtime</th> </tr></thead>
			<tbody>
			<?php 
			foreach($info as $found) { ?> 
				<tr>
					<td style="padding-right:7px;"><?php echo $found['name'];?> </td>
					<td style="padding-right:7px;">$<?php echo number_format($found['bankacc']);?> </td>
					<td style="padding-right:7px;"><?php echo secondsToTime($found['playtime']);?> </td>
					<td style="padding-right:7px;"><a href="editplayer.php?id=<?php echo $found['playerid'];?>">Edit player</a> </td>
				</tr>
				
			<?php } ?>
			<?php
			}
		}
	?></tbody></table>
	<br><br><br>
	<a class="btn btn-lg btn-primary btn-block" href="logout.php">Logout</a>
	</div>
	<img src="images/top_22.png" alt="" height="16" width="671">
</div>

<?php include "footer.php"; ?>
    
    