<?php

@include 'connection.php';
session_start();

	    $receipt_no                = $_POST["receipt_no"];
	    $client_insurance_no       = $_POST["client_insurance_no"];
	    $date                      = $_POST["date"];
	    $amount                    = $_POST["amount"];
	    $agent_email               = $_POST["agent_email"];
		$status = $_SESSION["email"] === "jyotirana@email.com" ? "APPROVED" : "PENDING";

		
		
	$sql = "INSERT INTO payment (receipt_no, client_insurance_no, date, amount, agent_email, status) VALUES('$receipt_no','$client_insurance_no', '$date', '$amount', '$agent_email', '$status');";
	
	try{
		$resultSet= mysqli_query($conn, $sql);

	$affectedRows= mysqli_affected_rows($conn);

	if($affectedRows>0){
		$_SESSION["success"] = "Client and payment successfully added!";

		header('Location: /HIB/home.php');
    	exit();
	}else{
		echo "Error";
	}
	}catch(Exception $e){
		echo $e;
	}