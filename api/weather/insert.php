<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Array JSON response
$response = array();
 
// Check if dapat field dr user
if (isset($_GET['temp']) && isset($_GET['hum']) && isset($_GET['press'])) {
 
    $temp = $_GET['temp'];
    $hum = $_GET['hum'];
    //tambahan press dari BMP280
    $press = $_GET['press'];
 
     // Include db konek
    $filepath = realpath (dirname(__FILE__));
	require_once($filepath."/db_connect.php");

 
    // konek ke DB
    $db = new DB_CONNECT();
 
    // Set SQL query insert data weather status by id
    $result = mysql_query("INSERT INTO weather(temp,hum,press) VALUES('$temp','$hum','$press')");
 
    // cek ekse query
    if ($result) {
        // berhasil insert
        $response["success"] = 1;
        $response["message"] = "Weather successfully created.";
 
        // tampil respon JSON
        echo json_encode($response);
    } else {
        // gagal insert
        $response["success"] = 0;
        $response["message"] = "Something has been wrong";
 
        // tampil respon JSON
        echo json_encode($response);
    }
} else {
    // If param kosong
    $response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request";
 
    // tampil respon JSON
    echo json_encode($response);
}
?>