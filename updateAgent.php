<?php

@include 'connection.php';
session_start();

$email                      = $_POST["email"];
$full_name                  = $_POST["full_name"];
$branch                     = $_POST["branch"];
$mobile_no                  = $_POST["mobile_no"];

echo($email);


$sql = "UPDATE agent SET full_name='$full_name', branch='$branch', mobile_no='$mobile_no' WHERE email='$email';";

try {
	$resultSet = mysqli_query($conn, $sql);
	$affectedRows = mysqli_affected_rows($conn);
	if ($affectedRows > 0) {
		header('Location: /HIB/agent.php');
    	exit();
	}
	mysqli_close($conn);
} catch (Exception $e) {
	echo $e;
}

?>