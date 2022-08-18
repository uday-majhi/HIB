<?php
    session_start();
    $role = $_SESSION["role"];
    if($role !== "agent"){
        header("location: /HIB/home.php");
        exit();
    }

    $client_insurance_no = $_POST["client_insurance_no"];

    if($client_insurance_no === ""){
        header("location: /HIB/home.php");
        exit();
    }


    $client_status_url = "location: /HIB/clientStatus.php?client_insurance_no=$client_insurance_no";

    try{
    header($client_status_url);
            exit();
    }catch(Exception $e){
        echo $e;
    }