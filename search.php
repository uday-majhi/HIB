<?php
include "connection.php";

session_start();
$role = $_SESSION["role"];
if ($role !== "agent") {
    header("location: /HIB/home.php");
    exit();
}

$client_insurance_no = $_POST["client_insurance_no"];

if ($client_insurance_no === "") {
    header("location: /HIB/home.php");
    exit();
}

$sql = "SELECT citizenship_no FROM client WHERE client_insurance_no='$client_insurance_no'";

try {
    $resultSet = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($resultSet);

    if ($numRows > 0) {
        $client_status_url = "location: /HIB/clientStatus.php?client_insurance_no=$client_insurance_no";
        header($client_status_url);
        exit();
    } else {
        $_SESSION["error"] = "Client with the provided insurance id is not found.";
        header("location: /HIB/home.php");
        exit();
    }
} catch (Exception $e) {
    echo $e;
}