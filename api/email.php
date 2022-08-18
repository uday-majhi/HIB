<?php
include "../connection.php";

$table = $_GET["table"];
$email = $_GET["email"];

$sql = "SELECT * FROM $table WHERE email='$email'";

try {
    $resultSet = mysqli_query($conn, $sql);
    $clientCount = mysqli_num_rows($resultSet);

    if ($clientCount > 0) {
        $json = json_encode(array('error' => "The client email '$email' already exists."));

        header('Content-Type: application/json; charset=utf-8');
        echo $json;
    }
} catch (Exception $e) {
    echo $e;
}