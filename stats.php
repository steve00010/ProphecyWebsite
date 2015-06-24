<?php 
include "header.php";
define('__ROOT__', dirname(__FILE__));
//require_once(__ROOT__.'/controllers/playersc.php'); 
require_once(__ROOT__.'/models/connection.php');
require_once(__ROOT__.'/models/PlayerM.php');

$db = new DBConnection();
$PM = new PlayersM($db);
$IPCON = false;
$IPC = $PM->GetUserByIP($_SERVER['REMOTE_ADDR']);
if($IPC) {
	if(sizeOf($IPC) ==1) {
		$IPCON = true;
	}
}
 ?>
  <div class="container" >

	<div style="padding:0px 4px 0px 17px; "height="20px">
	<h2>Welcome to your Alits Life control centre!</h2>
	<form method="post" action="player.php" role="form" id="userform" >
            <div class="input-group">
                <input type="text" class="form-control" style="width:200px" placeholder="Enter your Player ID here" name="player_id" >
                <span class="input-group-btn">
                    <button class="btn btn-success" name="gogo" type="submit" >Get Your Data!</button>
                </span>
                
            </div>
        </form>
		<?php if($IPCON) { 
		?> 	
		<script language="JavaScript">
			window.onload = function()
			{ 
				$('input[name="player_id"]').val("<?php echo $IPC[0]; ?>");
				$('#userform').submit();
			}
	
		</script> <?php } ?>
	
	
	
	</div>

</div>
<?php include "footer.php"; ?>