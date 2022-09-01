<?php include 'header.php'; 
        
                
include 'connection.php';


	    $email         = $_POST["email"];
		$password      = $_POST["password"];
		$full_name     = $_POST["full_name"];
		$branch        = $_POST["branch"];
		$mobile_no     = $_POST["mobile_no"];

        $hashed_password = md5($password);
		
        $sql = "INSERT INTO agent (email, password, full_name, branch, mobile_no) VALUES('$email', '$hashed_password', '$full_name', '$branch', '$mobile_no')";
	
        try{
            $resultSet= mysqli_query($conn, $sql);
    
        $affectedRows= mysqli_affected_rows($conn);
        if($affectedRows>0){
           $_SESSION['success']= 'Agent added succesfully';
            header("location:agent.php");
            exit();
        }else{
            echo "Error";
        }
        }catch(Exception $e){
            echo $e;
        }
		
?>