<?php 
include "header.php";
define('__ROOT__', dirname(__FILE__));
//require_once(__ROOT__.'/controllers/playersc.php'); 
require_once(__ROOT__.'/models/connection.php');
require_once(__ROOT__.'/models/PlayerM.php');

$db = new DBConnection();
$PM = new PlayersM($db);

$row1 = $PM->GetTopTenTime();
$row2 = $PM->GetTopTenWanted();
function secondsToTime($seconds) {
    $dtF = new DateTime("@0");
    $dtT = new DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%ad:%hh:%im');
}
function trim_value($value) 
{ 
    $value = trim($value);
	return $value;
}
function CrimetoStr($crime) {
	switch($crime) {
		case "187V": return "Vehicular Manslaughter"; break;
		case "187": return "Manslaughter"; break;
		case "901": return "Escaping Jail"; break;
		case "215": return "Attempted Auto Theft"; break;
		case "213": return "Use of illegal explosives"; break;
		case "211": return "Robbery"; break;
		case "207": return "Kidnapping"; break;
		case "207A": return "Attempted Kidnapping"; break;
		case "390": return "Public Intoxication"; break;
		case "487": return "Grand Theft"; break;
		case "488": return "Petty Theft"; break;
		case "480":	return "Hit and run"; break;
		case "481": return "Drug Possession"; break;
		case "482": return "Intent to distribute"; break;
		case "483": return "Drug Trafficking"; break;
		case "459": return "Burglary"; break;
		case "666": return "Tax Evasion"; break;
		case "667": return "Terrorism"; break;
		case "668": return "Unlicensed Hunting"; break;
		case "919": return "Organ Theft"; break;
		case "919A": return "Attempted Organ Theft"; break;
		default:return $crime; break;
		case "1": return "Driving without Lights"; break;
		case "2": return "Driving without License"; break;
		case "3": return "Speeding"; break;
		case "4": return "Reckless Driving"; break;
		case "5": return "Driving a Stolen Vehicle"; break;
		case "6": return "Hit and Run"; break;
		case "7": return "Attempted Murder"; break;
	}
}
function handlecharges($chargelist) {
	$chargelist = str_replace('"','',$chargelist);
	$chargelist = str_replace('[','',$chargelist);
	$chargelist = str_replace(']','',$chargelist);

	$chargelist = explode(",",$chargelist);
	$vals = array_count_values($chargelist);
	while($val = current($vals)) {
		echo "&nbsp ".CrimetoStr(str_replace('`','',key($vals))) . " x " . $val."<br>";
		next($vals);
	}
}
 ?>
  <div class="container" >

	<div style="padding:0px 4px 0px 17px; "height="20px">
	<h2>Welcome to the Prophecy Gaming overview!</h2>
	
	
	
	
	</div>

	 <div style="padding:0px 4px 0px 17px; "height="20px">
	 <h1>Top ten players!</h1>
	 
	 <h3>Time!</h3>
	 <ol>
	 <?php foreach($row1 as $ccar) {
			echo "<li>".$ccar['name']."<br><ul><li>".secondsToTime($ccar['playtime'])."</li></ul></li><br>";		
		}
		?>
	 </ol>
	 </div>
	 	 <img src="images/top_22.png" alt="" height="16" width="671">
		  <div style="padding:0px 4px 0px 17px; "height="20px">
	 <h3>The top wanted criminals!</h3>
	 <table  border="1" style="border-color: #0D0D0D;border-collapse: collapse;">
	 <tr><th> </th><th>Name</th><th>Charges</th><th>Bounty</th></tr>
	 <tbody>
	 
	 <?php foreach($row2 as $i => $ccar) {
			
			?><tr><td> <?php echo $i + 1 ?> </td>
			
			<td>&nbsp <?php echo $ccar['wantedName'] ?> </td>
			<td><?php handlecharges($ccar['wantedCrimes'])?> </td>
			<td>&nbsp$<?php echo number_format($ccar['wantedBounty'])?> </td></tr><?php

	
		}
		?>
		</tbody>
	 </table>
	 </div>
</div>
<br >
<?php include "footer.php"; ?>