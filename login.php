<?php
	session_start();
	include 'connection.php';
	
	
		$email = $_POST["email"];
		$password = $_POST["password"];

	$hashed_password = md5($password);

	echo "runs...";	
	$agent_login_query = "SELECT email, full_name from agent where email='$email' AND password='$hashed_password'";
	$client_login_query = "SELECT email, full_name, client_insurance_no from client where email='$email' AND password='$hashed_password'";
		
	try{
		$agent_login_result_set= mysqli_query($conn, $agent_login_query);
		$agent_num_rows= mysqli_num_rows($agent_login_result_set);
	
		if($agent_num_rows>0){
			echo "Agent Logged In!";
			$_SESSION["email"] = $email;
			$_SESSION["full_name"] = $full_name;
			$_SESSION["role"] = "agent";

			header("Location: home.php");
		}else{
			echo "checking client...";
			$client_login_result_set= mysqli_query($conn, $client_login_query);
			$client_num_rows= mysqli_num_rows($client_login_result_set);
	
			if($client_num_rows>0){
				$client_data = mysqli_fetch_assoc($client_login_result_set);

				$_SESSION["email"] = $email;
				$_SESSION["full_name"] = $full_name;
				$_SESSION["role"] = "client";
				
				header("location: /HIB/clientStatus.php?client_insurance_no=$client_data[client_insurance_no]");
           		exit();
			}else{
				echo "Not found!";
			}
	
		}
	}catch(Exception $e){
		echo $e;
	}

	exit();
	if(!isset($_SESSION["email"])){
		header("Location: index.php");
	}
?>