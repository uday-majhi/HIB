<?php

include'connection.php';

$insurance_no  = $_GET["insurance_no"];

// sql to delete a record
$sql = "DELETE FROM nominee WHERE insurance_no='$insurance_no'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
        
$conn->close();
?>