<?php
include "../connection.php";

$insurance_no = $_GET["insurance_no"];

$sql = "SELECT * FROM nominee WHERE insurance_no='$insurance_no'";

try {
    $resultSet = mysqli_query($conn, $sql);
    $clientCount = mysqli_num_rows($resultSet);

    if ($clientCount > 0) {
        $json = json_encode(array('error' => "The client with insurance no '$insurance_no' already exists."));

        header('Content-Type: application/json; charset=utf-8');
        echo $json;
    }
} catch (Exception $e) {
    echo $e;
}