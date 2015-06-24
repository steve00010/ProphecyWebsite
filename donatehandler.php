<?php
define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__.'/models/connection.php');
require_once(__ROOT__.'/models/DonateM.php'); 
$db = new DBConnection();
$PM = new DonateM($db);


$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost = array();
foreach ($raw_post_array as $keyval) {
	$keyval = explode ('=', $keyval);
	if (count($keyval) == 2)
	$myPost[$keyval[0]] = urldecode($keyval[1]);
}
// read the IPN message sent from PayPal and prepend 'cmd=_notify-validate'
$req = 'cmd=_notify-validate';
if(function_exists('get_magic_quotes_gpc')) {
	$get_magic_quotes_exists = true;
}
foreach ($myPost as $key => $value) {
	if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
	$value = urlencode(stripslashes($value));
} else {
	$value = urlencode($value);
}
	$req .= "&$key=$value";
}
 
// STEP 2: POST IPN data back to PayPal to validate
 
$ch = curl_init('https://www.paypal.com/cgi-bin/webscr');
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));


// In wamp-like environments that do not come bundled with root authority certificates,
// please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set
// the directory path of the certificate as shown below:
// curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
if( !($res = curl_exec($ch)) ) {
	error_log("Got " . curl_error($ch) . " when processing IPN data");
	curl_close($ch);
	exit;
}
curl_close($ch);
 
// STEP 3: Inspect IPN validation result and act accordingly
 
if (strcmp ($res, "VERIFIED") == 0) {
// The IPN is verified, process it:
// check whether the payment_status is Completed
// check that txn_id has not been previously processed
// check that receiver_email is your Primary PayPal email
// check that payment_amount/payment_currency are correct
// process the notification
 
// assign posted variables to local variables
	$item_name = $_POST['item_name'];
	$item_number = $_POST['item_number'];
	$payment_status = $_POST['payment_status'];
	$payment_amount = $_POST['mc_gross'];
	$payment_currency = $_POST['mc_currency'];
	$txn_id = $_POST['txn_id'];
	$receiver_email = $_POST['receiver_email'];
	$payer_email = $_POST['payer_email'];
	$PID = $_POST['custom'];
	$fname = $_POST['first_name'];
	$lname = $_POST['last_name'];
	
	$level = $PM->getlevel($PID);
	$total = $PM->getdonatetotal($PID);
	$total = $total['total'];
	

	  
	
	if($level OR $total) {
		$file = 'test.txt';
		$current = file_get_contents($file);
		$current .= $res;
		file_put_contents($file, $current);
	
		$currentamount = 0;
		switch($level['donatorlvl']) {
			case 1: $currentamount = 5; break;
			case 2: $currentamount = 10; break;
			case 3: $currentamount = 15; break;
			case 4: $currentamount = 20; break;		
			case 5: $currentamount = 25; break;				
		}
		$newlevel = min((($payment_amount+max($currentamount,$total))/5),5);
		$totalamount = $payment_amount+max($currentamount,$total);
	}
	else {
		$newlevel = ($payment_amount/5);
		$totalamount = $payment_amount;
	}

	
	$logdonate = $PM -> logdonate($PID,$payer_email,$payment_amount,$totalamount,$fname,$lname);
	if($logdonate) {
		$setdonate = $PM -> setdonate($PID,$newlevel);
	}
	
} else if (strcmp ($res, "INVALID") == 0) {

	$file = 'test.txt';
	$current = file_get_contents($file);
	$current .= $res;
	file_put_contents($file, $current);
	  
	  
}
	
  
?>