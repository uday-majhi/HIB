<?php
include "../connection.php";

$identity = $_GET["identity"];

$sql = "SELECT * FROM nominee WHERE identity_no='$identity'";

try {
    $resultSet = mysqli_query($conn, $sql);
    $clientCount = mysqli_num_rows($resultSet);

    if ($clientCount > 0) {
        $json = json_encode(array('error' => "The client identity '$identity' already exists."));

        header('Content-Type: application/json; charset=utf-8');
        echo $json;
    }
} catch (Exception $e) {
    echo $e;
}