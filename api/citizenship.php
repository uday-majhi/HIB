<?php
include "../connection.php";

$table = $_GET["table"];
$citizenship_no = $_GET["citizenship_no"];

$sql = "SELECT * FROM $table WHERE citizenship_no='$citizenship_no'";

try {
    $resultSet = mysqli_query($conn, $sql);
    $clientCount = mysqli_num_rows($resultSet);

    if ($clientCount > 0) {
        $json = json_encode(array('error' => "The client citizenship_no '$citizenship_no' already exists."));

        header('Content-Type: application/json; charset=utf-8');
        echo $json;
    }
} catch (Exception $e) {
    echo $e;
}