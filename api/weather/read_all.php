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
 
 // Set SQL query get semua data dr weather status by id
$result = mysql_query("SELECT *FROM weather") or die(mysql_error());
 
// cek ekse query
if (mysql_num_rows($result) > 0) {
    
	// Simpan returned dg array
    $response["weather"] = array();
 
	// While loop simpan semua returned response
    while ($row = mysql_fetch_array($result)) {
        // user array sementara
        $weather = array();
        $weather["id"] = $row["id"];
        $weather["temp"] = $row["temp"];
        $weather["hum"] = $row["hum"];
        //tambahan press dari BMP280
        $weather["press"] = $row["press"];

		// Push all
        array_push($response["weather"], $weather);
    }
    // On jadi
    $response["success"] = 1;
 
    // tampil respon JSON
    echo json_encode($response);
}	
else 
{
    // If data kosong
	$response["success"] = 0;
    $response["message"] = "No data on weather found";
 
    // tampil respon JSON
    echo json_encode($response);
}
?>