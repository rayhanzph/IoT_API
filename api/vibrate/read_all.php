<?php
 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Array JSON response
$response = array();
 
// Include db konek
$filepath = realpath (dirname(__FILE__));
require_once($filepath."/db_connect.php");

 // konek ke DB
$db = new DB_CONNECT();

$result = mysql_query("SELECT *FROM vibrate") or die(mysql_error());

if(mysql_num_rows($result) > 0) {
    $response["vibrate"] = array();
    while($row = mysql_fetch_array($result)) {
        $vibrate = array();
        $vibrate["id"] = $row["id"];
        $vibrate["status"] = $row["status"];
        array_push($response["vibrate"], $vibrate);
    }
    
    echo json_encode($response);
}
 
// Check if dapat field dr user
/*
if (isset($_GET["id"])) {
    $id = $_GET['id'];
 
     // Set SQL query get vibrate status by id
    $result = mysql_query("SELECT *FROM vibrate WHERE id = '$id'");
	
	//If returned result
    if (!empty($result)) {

        // cek eksek query
        if (mysql_num_rows($result) > 0) {
			
			// Simpan returned array respon
            $result = mysql_fetch_array($result);
			
			// array sementara
            $vibrate = array();
            $vibrate["id"] = $result["id"];
            $vibrate["status"] = $result["status"];
          
            $response["success"] = 1;

            $response["vibrate"] = array();
			
			// Push item
            array_push($response["vibrate"], $vibrate);
 
            // tampil respon JSON
            echo json_encode($response);
        } else {
            // If data kosong
            $response["success"] = 0;
            $response["message"] = "No data on vibrate found";
 
            // tampil respon JSON
            echo json_encode($response);
        }
    } else {
        // If data kosong
        $response["success"] = 0;
        $response["message"] = "No data on vibrate found";
 
        // tampil respon JSON
        echo json_encode($response);
    }
} else {
    // Jika param tidak ada
    $response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request";
 
    
    echo json_encode($response);
}
*/
?>