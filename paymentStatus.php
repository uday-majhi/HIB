<?php 

include "connection.php";

$action = $_GET["action"];
$client_insurance_no = $_GET["client_insurance_no"];

$status = $action === "approve" ? "APPROVED" : "DECLINED";

$update_query = "UPDATE payment SET status='$status' WHERE client_insurance_no='$client_insurance_no';";

try{
    $resultSet= mysqli_query($conn, $update_query);

$affectedRows= mysqli_affected_rows($conn);
if($affectedRows>0){
    header("location:payment.php");
    exit();
}else{
    echo "Error";
}
}catch(Exception $e){
    echo $e;
}

?>