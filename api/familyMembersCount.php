<?php
include "../connection.php";

$insurance_no = $_GET["insurance_no"];

$sql = "SELECT * FROM nominee WHERE client_insurance_no='$insurance_no'";

try {
    $resultSet = mysqli_query($conn, $sql);
    $clientCount = mysqli_num_rows($resultSet);


    $json = json_encode(array('count' => $clientCount+1)); // INFO: +1 as the client is included in the count

    header('Content-Type: application/json; charset=utf-8');
    echo $json;
} catch (Exception $e) {
    echo $e;
}