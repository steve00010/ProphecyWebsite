<?php
define('__ROOT__', dirname(__FILE__));
//require_once(__ROOT__.'/controllers/playersc.php'); 
require_once(__ROOT__.'/models/connection.php');
require_once(__ROOT__.'/models/PlayerM.php');


$db = new DBConnection();
$PM = new PlayersM($db);

if (!$PM->checkStatus($_POST['player_id'])){
    die("Please fill in a valid Player ID");
} else { $pid = $_POST['player_id']; }
function secondsToTime($seconds) {
    $dtF = new DateTime("@0");
    $dtT = new DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%ad:%hh:%im');
}
function carName($car) {
	switch($car) {
		case "B_Quadbike_01_F":	
			return "QuadBike";
			break;
		case "C_Offroad_01_F":	
			return "Offroad";
			break;	
		case "C_Boat_Civil_01_F":	
			return "Boat";
			break;
		case "B_MRAP_01_F":	
			return "Hunter";
			break;	
		case "O_Heli_Transport_04_bench_F":	
			return "Taru";
			break;	
		case "B_Heli_Light_01_F":	
			return "Hummingbird";
			break;
		case "C_Hatchback_01_sport_F":	
			return "Hatchback Sport";
			break;
		case "C_SUV_01_F":	
			return "SUV";
			break;
		case "C_Van_01_transport_F":	
			return "Transport Van";
			break;
		case "B_Heli_Transport_01_F":	
			return "Ghost Hawk";
			break;
		case "B_Heli_Transport_01_camo_F":	
			return "Ghost Hawk Camo";
			break;			
		case "B_Truck_01_transport_F":	
			return "HEMTT Transport";
			break;
		case "B_Truck_01_covered_F":	
			return "HEMTT Transport (Covered)";
			break;
		case "B_Truck_01_mover_F":	
			return "HEMTT";
			break;
		case "B_Truck_01_box_F":	
			return "HEMTT Box";
			break;
		case "B_Truck_01_Repair_F":	
			return "HEMTT Repair";
			break;
		case "B_Truck_01_ammo_F":	
			return "HEMTT Ammo";
			break;	
		case "O_Heli_Light_02_unarmed_F":	
			return "PO-30 Orca (Black)";
			break;
		case "I_Heli_light_03_F":	
			return "WY-55 Hellcat";
			break;			
		case "C_Hatchback_01_F":	
			return "Hatchback";
			break;	
		case "C_Van_01_box_F":	
			return "Boxer Truck";
			break;
		case "I_MRAP_03_F":	
			return "Strider";
			break;
		case "B_Heli_Light_01_armed_F":	
			return "Pawnee";
			break;
		default:
			return $car;
		break;
	}	
}

$row = $PM->getUser($pid);
if(!$row) { die("Player not found, either join the server first or check you put in the correct player ID!"); }
$row1 = $PM->getCivCars($pid);
$row2 = $PM->getCopCars($pid);
$row3 = $PM->GetBounty($pid);
include "header.php";
?>
  <div class="container" >

	<div style="padding:0px 4px 0px 17px;">
	<h1>Your Stats!</h1>
	<br />
	<p>In game name: <?php echo $row['name']?> </p>
	<p>Cash: $<?php echo number_format($row['cash'])?> </p>
	<p>Bank: $<?php echo number_format($row['bankacc'])?> </p>	
	<p>Player time: <?php echo secondsToTime($row['playtime']) ?> </p>
	<p>Bounty: $<?php echo number_format(max(0,$row3['wantedBounty'])); ?> <p>
	<p>Rebel: <?php 
	if(strpos($row['civ_licenses'],'license_civ_rebel') !== false) {
		echo "You dirty rebel!";
	} else { echo "Good boy, not a rebel!"; }
	?></p>	
	
	
	<p>Cop rank: <?php 
	switch($row['coplevel']) {
		default: echo "Not in the police force!"; break;
		case 1: echo "Cadet"; break;
		case 2: echo "Marshall"; break;
		case 3: echo "Corporal"; break;
		case 4: echo "Sergeant"; break;
		case 5: echo "Lieutenant"; break;
		case 6: echo "Captain"; break;
		case 7: echo "Chief"; break;
	}?> </p>
	<p>Medic rank: <?php 
	switch($row['mediclevel']) {
		default: echo "Not a medic!"; break;
		case 1: echo "Junior Medic"; break;
		case 3: echo "Medic"; break;
		case 5: echo "Chief Medic"; break;

	}?> </p>
	<table>
	<thead><tr> <th>Civilian vehicles: </th><th>Police vehicles:</th> </tr></thead>
	<tbody>
	<tr>
	<td>
	<ul style="width:30%; float:left;"> <?php 
		foreach($row1 as $ccar) {
			echo "<li>".carName($ccar)."</li><br>";		
		}
	?></ul> </td><td>
	<p>    <ul style="width:30%; float:left;"> <?php 
		foreach($row2 as $ccar) {
			echo "<li>".carName($ccar)."</li><br>";		
		}
	?></ul></td></tbody></table>
	
	
	</div>
</div>
<?php include "footer.php"; ?>
    
    