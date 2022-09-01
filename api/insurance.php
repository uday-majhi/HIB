<?php
include "../connection.php";

$table = $_GET["table"];
$client_insurance_no = $_GET["client_insurance_no"];

$sql = "SELECT * FROM $table WHERE client_insurance_no='$client_insurance_no'";

try {
    $resultSet = mysqli_query($conn, $sql);
    $clientCount = mysqli_num_rows($resultSet);

    if ($clientCount > 0) {
        $json = json_encode(array('error' => "The client with insurance no '$client_insurance_no' already exists."));
    
        header('Content-Type: application/json; charset=utf-8');
        echo $json;
    }else{
        $json = json_encode(array('message' => "Good to go!"));
    
        header('Content-Type: application/json; charset=utf-8');
        echo $json;

    }
} catch (Exception $e) {
    echo $e;
}