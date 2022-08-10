<?php
include "../connection.php";

    $client_insurance_no = $_GET["client_insurance_no"];

    $sql = "SELECT * FROM nominee WHERE client_insurance_no='$client_insurance_no'";

    try {
        $resultSet = mysqli_query($conn, $sql);
        $family_members_count = mysqli_num_rows($resultSet);

        $BASE_AMOUNT = 3500;
        $PER_HEAD = 700;
        $amount_to_be_paid;

        $total_members = $family_members_count + 1; // +1 for the client
        
        if($total_members <= 5){
            $amount_to_be_paid = $BASE_AMOUNT;
        }else{
            $additional_members = $total_members - 5;
            $additional_members_amount = $PER_HEAD * $additional_members;

            $amount_to_be_paid = $BASE_AMOUNT + $additional_members_amount;
        }

        $json = json_encode(array('amount_to_be_paid'=>$amount_to_be_paid));
        
        header('Content-Type: application/json; charset=utf-8');
        echo $json;

    } catch (Exception $e) {
        echo $e;
    }