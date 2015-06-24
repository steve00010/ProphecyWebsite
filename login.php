<?php
define('__ROOT__', dirname(__FILE__));
//require_once(__ROOT__.'/controllers/playersc.php'); 
require_once(__ROOT__.'/models/connection.php');
require_once(__ROOT__.'/models/PlayerM.php');
session_start();

$logged = false;
$db = new DBConnection();
$PM = new PlayersM($db);
if(isset($_SESSION['login_user'])) { $logged = true; }
else {
if (!empty($_POST)) {
	
	$info = $PM->Login($_POST['user'],$_POST['pword']);
	
	if($info != false) {
	
		$_SESSION['login_user'] = $_POST['user'];
		$_SESSION['login_pswd'] = $_POST['pword'];
		if($info['cop'] == 1) {
			$_SESSION['login_cop'] = 1;
		}if($info['medic'] == 1){ 
			$_SESSION['login_medic'] = 1;

		}if($info['admin'] == 1) {
			$_SESSION['login_admin'] = 1;
		}
		$logged = true;
	
	}
	else {
		echo ("Unable to login with those credentials, please try again");
		die($info);

	
	}

}
}
include "header.php";
?>
   <div class="container basic-set marketing" >

	<?php if(!$logged) { ?>
			<form class="form-signin" method='post' action='login.php'>
                    <h2 class="form-signin-heading">Please sign in</h2>
                    <input type="text" class="form-control" name='user' placeholder="Username" autofocus>
                    <input type="password" class="form-control" name='pword' placeholder="Password">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                </form>
				
				<?php } else { ?>
				
				<p><a href="cop.php">Cop centre</a></p>
				<p><a href="medic.php">Medic centre</a></p>			
				<p><a href="admin.php">Admin centre</a></p>			
				
				<?php } ?>
		<br><br><br>
	<a class="btn btn-lg btn-primary btn-block" href="logout.php">Logout</a>
	</div>

</div>

<?php include "footer.php"; ?>
    
    