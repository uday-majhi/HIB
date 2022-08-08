<?php
include "connection.php";
session_start();


$insurance_no       = $_POST["family_member_insurance_no"];
$name              = $_POST["family_member_name"];
$gender               = $_POST["family_member_gender"];
$birth_date        = $_POST["family_member_birth_date"];
$identity_no       = $_POST["family_member_identity_no"];
$relationship      = $_POST["family_member_relationship"];
$image = $_POST["family_member_image"];
$fsp                  = $_POST["family_member_fsp"];

$client_insurance_no = $_SESSION['client_insurance_no'];

$sql = "INSERT INTO nominee (client_insurance_no, insurance_no, name, gender, birth_date, identity_no, relationship, image, fsp) VALUES('$client_insurance_no', '$insurance_no', '$name', '$gender', '$birth_date', '$identity_no', '$relationship',  '$image', '$fsp')";

try {
    $resultSet = mysqli_query($conn, $sql);

    $affectedRows = mysqli_affected_rows($conn);
    if ($affectedRows > 0) {
        echo "Added a Family member!";
        header('Location: /HIB/addFamilyMember.php');
        exit();
    } else {
        echo "Error";
    }
} catch (Exception $e) {
    echo $e;
}