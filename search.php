<?php
    $role = $_SESSION["role"];
    if($role !== "agent"){
        header("location: /HIB/home.php");
        exit();
    }
?>

<?php 
    $client_insurance_no = $_POST["client_insurance_no"];

    $client_status_url = "location: /HIB/clientStatus.php?client_insurance_no=$client_insurance_no";

    try{
    header($client_status_url);
            exit();
    }catch(Exception $e){
        echo $e;
    }
?>