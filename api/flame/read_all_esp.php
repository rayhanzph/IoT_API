<?php
 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$response = array();
 

$filepath = realpath (dirname(__FILE__));
require_once($filepath."/db_connect.php");


$db = new DB_CONNECT();
 

if (isset($_GET["id"])) {
    $id = $_GET['id'];
 
  
    $result = mysql_query("SELECT *FROM led WHERE id = '$id'");
	
	
    if (!empty($result)) {

        
        if (mysql_num_rows($result) > 0) {
			
			
            $result = mysql_fetch_array($result);
			
			
            $led = array();
            $led["id"] = $result["id"];
            $led["status"] = $result["status"];
          
            $response["success"] = 1;

            $response["led"] = array();
			
			
            array_push($response["led"], $led);
 
            
            echo json_encode($response);
        } else {
            
            $response["success"] = 0;
            $response["message"] = "No data on led found";
 
            
            echo json_encode($response);
        }
    } else {
        
        $response["success"] = 0;
        $response["message"] = "No data on led found";
 
        // Show JSON response
        echo json_encode($response);
    }
} else {
    
    $response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request";
 
 
    echo json_encode($response);
}
?>