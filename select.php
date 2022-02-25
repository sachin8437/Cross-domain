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


//echo json_encode(array('status' => 'OK'));


 
//include "insert.php";

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
  global $conn;
  
   $get = "SELECT * FROM wabinar_url ORDER BY id DESC"; //data get front end
$data = mysqli_query($conn, $get); //function. 2variable pass $conn or $select
$total = mysqli_num_rows($data);
   $result = mysqli_fetch_assoc($data); 
   //print_r($result);
      $id = $result['id'];
     $web_url =  $result['urls'];
   //echo $id ; 
 //  echo $web_url;
   
   
   header('Content-type: application/json');
echo json_encode($result);

  
   
  
?>
