<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Array JSON response
$response = array();
 
// Check if dapat field dr user
if (isset($_GET['id']) && isset($_GET['temp'])) {
 
    $id = $_GET['id'];
    $temp= $_GET['temp'];
    
 
     // Include db konek
	$filepath = realpath (dirname(__FILE__));
	require_once($filepath."/db_connect.php");

	// konek ke DB
    $db = new DB_CONNECT();
 
	// Set SQL query update weather status by id
    $result = mysql_query("UPDATE weather SET temp= '$temp' WHERE id = '$id'");
 
    // cek ekse query
    if ($result) {
        // successfully updation of temp (temperature)
        $response["success"] = 1;
        $response["message"] = "Weather Data successfully updated.";
 
        // tampil respon JSON
        echo json_encode($response);
    } else {
 
    }
} else {
    // If param kosong
    $response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request";
 
    // tampil respon JSON
    echo json_encode($response);
}
?>