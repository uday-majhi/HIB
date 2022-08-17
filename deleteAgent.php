<!DOCTYPE html>
<html>

<head>
    <style>
    input[type=text],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .btn {
        background-color: #4CAF50;
        float: right;
        color: white;
        text-decoration: none;
    }


    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Delete Agent</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php include 'header.php'; 
?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Agent Status
                <button class="btn" align="center">
                    <a href="addAgent.php" class="btn">Add Agent</a>
                </button>
            </h1>




            <?php

include'connection.php';

$email  = $_GET["email"];

$sql = "DELETE FROM agent WHERE email='$email'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('Location: /HIB/agent.php');
} else {
    echo "Error deleting record: " . $conn->error;
}
        
$conn->close();
?>

        </div>

    </div>

</div>

</body>

</html>