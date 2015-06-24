<?php
	ini_set( "display_errors", 1);
	define('__ROOT__', dirname(__FILE__));
	//require_once(__ROOT__.'/controllers/playersc.php'); 
	require_once(__ROOT__.'/models/RconM.php');
	require_once(__ROOT__.'/models/connection.php');
	$db = new DBConnection();
	error_reporting (E_ALL ^ E_NOTICE);
	$cmd = "Players";
	$serverip = "46.105.108.98";
	$serverport = "2302";
	$rconpassword = "X73lDL05y99f1J";
	$RCON = new RconM($serverip,$serverport,$rconpassword,$db);
	
	$answer = $RCON->rcon($cmd);
	
	if ($answer != ""){
	
	
		$k = strrpos($answer, "---");
		$l = strrpos($answer, "(");
		$out = substr($answer, $k+4, $l-$k-5);
		$array = preg_split ('/$\R?^/m', $out);
		$players = array();
		for ($j=0; $j<count($array); $j++){
			$players[] = "";
		}
		for ($i=0; $i < count($array); $i++)
		{
			$m = 0;
			for ($j=0; $j<5; $j++){
				$players[$i][] = "";
			}
			$pout = preg_replace('/\s+/', ' ', $array[$i]);
			for ($j=0; $j<strlen($pout); $j++){
				$char = substr($pout, $j, 1);
				if($m < 4){
					if($char != " "){
						$players[$i][$m] .= $char;
						}else{
						$m++;
					}
				} else {
					$players[$i][$m] .= $char;
				}
			}
		}
		$pnumber = count($players);
		echo $pnumber . "<br>";
		for ($i=0; $i<count($players); $i++){
			if(strlen($players[$i][4])>1){
				$k = strrpos($players[$i][4], " (Lobby)");
				$playername = str_replace(" (Lobby)", "", $players[$i][4]);
				$paren_num = 0;
				$chars = str_split($playername);
				$new_string = '';
				foreach($chars as $char) {
					if($char=='[') $paren_num++;
					else if($char==']') $paren_num--;
					else if($paren_num==0) $new_string .= $char;
				}
				$playername = trim($new_string);
				$search = preg_replace("/[^\w\x7F-\xFF\s]/", " ", $playername);
				$good = trim(preg_replace("/\s(\S{1,2})\s/", " ", preg_replace("[ +]", " "," $search ")));
				$good = trim(preg_replace("/\([^\)]+\)/", "", $good));
				$good = preg_replace("[ +]", " ", $good);
				$x = 0;
				$y = 0;
				$ip = $players[$i][1];
				$ping = $players[$i][2];
				$name = $players[$i][4];
				$id = "0";
				$uid = "0";
				
				$row= $RCON->CheckNameOnline($name);
				if($row) {
					
					$ipfix = explode(":",$ip);
					if($row['ip'] != $ipfix[0]) {
						echo $name . " " .$ipfix[0]. " ONLINE - storing/updating <br>";		
						$RCON -> SetIP($ipfix[0],$row['playerid']);	
					}	else {							
					echo $name . " " .$ipfix[0]. " ONLINE - already stored<br>";	
					}					
				} else  { echo $name . " " .$ip. " - not stored <br> "; }
			}
		}
	} else { echo "RUH ROH"; }
?>