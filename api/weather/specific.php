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
 
// Check if dapat field dr user
if (isset($_GET["id"])) {
    $id = $_GET['id'];
 
     // Set SQL query get weather status by id
    $result = mysql_query("SELECT *FROM weather WHERE id = '$id'");
	
	//If returned not empty
    if (!empty($result)) {

        // cek ekse query
        if (mysql_num_rows($result) > 0) {
			
			// Simpan returned dg array
            $result = mysql_fetch_array($result);
			
			// user array sementara
            $weather = array();
            $weather["id"] = $result["id"];
            $weather["temp"] = $result["temp"];
			$weather["hum"] = $result["hum"];
            //tambahan press dari BMP280
            $weather["press"] = $result["press"];

            $response["success"] = 1;

            $response["weather"] = array();
			
			// Push all
            array_push($response["weather"], $weather);
 
            // tampil respon JSON
            echo json_encode($response);
        } else {
            // If data kosong
            $response["success"] = 0;
            $response["message"] = "No data on weather found";
 
            // tampil respon JSON
            echo json_encode($response);
        }
    } else {
        // If data kosong
        $response["success"] = 0;
        $response["message"] = "No data on weather found";
 
        // Show JSON response
        echo json_encode($response);
    }
} else {
    // If required parameter is missing
    $response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request";
 
    // tampil respon JSON
    echo json_encode($response);
}
?>