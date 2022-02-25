<?php
// http://www.example.org/ajax.php
if (!isset($_SERVER['HTTP_ORIGIN'])) {
    // This is not cross-domain request
    exit;
}

$wildcard = true; // Set $wildcard to TRUE if you do not plan to check or limit the domains
$credentials = true; // Set $credentials to TRUE if expects credential requests (Cookies, Authentication, SSL certificates)
$allowedOrigins = array('https://creativemediasystems.lpages.co', 'http://jsfiddle.net');
if (!in_array($_SERVER['HTTP_ORIGIN'], $allowedOrigins) && !$wildcard) {
    // Origin is not allowed
    exit;
}
$origin = $wildcard && !$credentials ? '*' : $_SERVER['HTTP_ORIGIN'];

header("Access-Control-Allow-Origin: " . $origin);
if ($credentials) {
    header("Access-Control-Allow-Credentials: true");
}
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Origin");
header('P3P: CP="CAO PSA OUR"'); // Makes IE to support cookies

// Handling the Preflight
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') { 
    exit;
}

// Response
header("Content-Type: application/json; charset=utf-8");


echo json_encode(array('status' => 'OK'));


?>


<?php

$result = array();
 $result['sucess'] = "New record created successfully 1";
 

	$dbhost="localhost";
	$dbuser="dbuglndz_web2lead";
	$password="u#bLuJF&V_.G";
	$dbname="dbuglndz_webinar";
	$conn = new mysqli($dbhost, $dbuser, $password, $dbname);
		if($conn){
		//	echo "conecting";
			}else{
			   echo "not conect";
			} 
			
	$result['data']		 = $_POST['wj_lead_unique_link_live_room'];
			
$name = $result['data'];
echo $name;
$sql = "INSERT INTO wabinar_url (urls) VALUES ('".$name."')";

if ($conn->query($sql) === TRUE) {
 $result['sucess'] = "New record created successfully 2";
} else {
  $result['error'] =   "Error: " . $sql . "<br>" . $conn->error;
}


//echo json_encode($result) ;  


?>


