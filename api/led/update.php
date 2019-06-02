<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Array JSON response
$response = array();
 
// Check if dapat field dr user
if (isset($_GET['id']) && isset($_GET['status'])) {
 
    $id = $_GET['id'];
    $status= $_GET['status'];
    
 
    // Include db konek
	$filepath = realpath (dirname(__FILE__));
	require_once($filepath."/db_connect.php");

	// konek ke DB
    $db = new DB_CONNECT();
 
	// Set SQL query update led status by id
    $result = mysql_query("UPDATE led SET status= '$status' WHERE id = '$id'");
 
    // cek ekse query
    if ($result) {
        // update sukses (update)
        $response["success"] = 1;
        $response["message"] = "LED Status successfully updated.";
 
        // tampil respon JSON
        echo json_encode($response);
    } else {
 
    }
} else {
    // Jika param tidak ada
    $response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request";
 
    
    echo json_encode($response);
}
?>