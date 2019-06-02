<?php
 
header('content-type: application/json; charset=utf-8');
header("access-control-allow-origin: *");

//Array JSON response
$response = array();
 
// Check if dapat field dr user
if (isset($_GET['id'])) {
    $id = $_GET['id'];
 
     // Include db konek
    $filepath = realpath (dirname(__FILE__));
	require_once($filepath."/db_connect.php");
 
    // konek ke DB
    $db = new DB_CONNECT();
 
    // Set SQL query delete data weather status by id
    $result = mysql_query("DELETE FROM weather WHERE id = $id");
 
    // cek ekse query
    if (mysql_affected_rows() > 0) {
        // successfully deleted
        $response["success"] = 1;
        $response["message"] = "Data successfully deleted";
 
        // tampil respon JSON
        echo json_encode($response);
    } else {
        // id tidak sama
        $response["success"] = 0;
        $response["message"] = "No weather data found by given id";
 
        // tampil respon fail JSON
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