<?php

@include 'connection.php';
session_start();

	    $client_insurance_no       = $_POST["client_insurance_no"];
		$full_name                 = $_POST["full_name"];
		$email                     = $_POST["email"];
		$password                  = $_POST["password"];
		$gender                    = $_POST["gender"];
		$birth_date                = $_POST["birth_date"];
		$citizenship_no            = $_POST["citizenship_no"];
		$mobile_no                 = $_POST["mobile_no"];
		$address                   = $_POST["address"];
		$policy_id                 = $_POST["policy_id"];
		$agent_email               = $_POST["agent_email"];
		$image                     = $_POST["client_image"];
		$fsp                       = $_POST["fsp"];
		$insertClientAndPay = $_POST['insertClientAndPay'];

		$hashedPassword = md5($password);
		
		
	$sql = "INSERT INTO client (client_insurance_no, full_name, image, password, gender, birth_date, citizenship_no, mobile_no, address, email, policy_id, agent_email, fsp) VALUES('$client_insurance_no', '$full_name', '$image', '$hashedPassword', '$gender', '$birth_date', '$citizenship_no', '$mobile_no', '$address','$email', '$policy_id', '$agent_email', '$fsp')";
	
	try{
		$resultSet= mysqli_query($conn, $sql);

	$affectedRows= mysqli_affected_rows($conn);
	if($affectedRows>0){
		$_SESSION['client_insurance_no'] = $client_insurance_no;

		$redirect_to = isset($insertClientAndPay) ? '/HIB/addPayment.php?client_insurance_no='.$client_insurance_no  : '/HIB/addFamilyMember.php?client_insurance_no='.$client_insurance_no;

        header('Location: '.$redirect_to);
    	exit();
	}else{
		echo "Error";
	}
	}catch(Exception $e){
		echo $e;
	}
		
?>