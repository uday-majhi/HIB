<?php

@include 'connection.php';
session_start();

$client_insurance_no       = $_POST["client_insurance_no"];
$full_name                 = $_POST["full_name"];
$email                     = $_POST["email"];
$gender                    = $_POST["gender"];
$birth_date                = $_POST["birth_date"];
$citizenship_no            = $_POST["citizenship_no"];
$mobile_no                 = $_POST["mobile_no"];
$address                   = $_POST["address"];
$policy_id                 = $_POST["policy_id"];
$agent_email               = $_POST["agent_email"];
$image                     = $_POST["client_image"];
$fsp                       = $_POST["fsp"];


$sql = "UPDATE client SET full_name='$full_name', email='$email', gender='$gender', birth_date='$birth_date', citizenship_no='$citizenship_no', mobile_no='$mobile_no', address='$address', policy_id='$policy_id', agent_email='$agent_email', image='$image', fsp='$fsp' WHERE client_insurance_no='$client_insurance_no';";

try {
	$resultSet = mysqli_query($conn, $sql);
	$affectedRows = mysqli_affected_rows($conn);
	if ($affectedRows > 0) {
		$_SESSION["success"] = "Client updated successfully!";
		
		header('Location: /HIB/client.php');
    	exit();
	}
	mysqli_close($conn);
} catch (Exception $e) {
	echo $e;
}