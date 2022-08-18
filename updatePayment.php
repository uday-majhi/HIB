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
    <title>Update Payment</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php include 'header.php'; 
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Update Payment
                <button class="btn" align="center">
                    <a href="addPayment.php" class="btn">Add Payment</a>
                </button>
            </h1>


            <?php 
	
include'connection.php';
	
	$receipt_no = $client_insurance_number = $date = $amount = $agent_email ="";
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		$receipt_no               = $_POST["receipt_no"];
		$client_insurance_no      = $_POST["client_insurance_no"];
		$date                     = $_POST["date"];
		$amount                   = $_POST["amount"];
		$agent_email              = $_POST["agent_email"];

        // echo($receipt_no);
        // echo($client_insurance_no);
        // echo($date);
        // echo($amount);
        // echo($agent_email);
		
        $sql = "UPDATE payment set receipt_no='$receipt_no' ,client_insurance_no='$client_insurance_no' ,date='$date',amount='$amount',agent_email='$agent_email' where receipt_no='$receipt_no'";
		
		if ($conn->query($sql) === true) {
            //use message notification
            // echo ("<script>
            // alert(\"Updated successfully\");
            // </script>");
            header('location:payment.php');
		} else {
            echo "Error: " . $sql . "<br>" . $conn->error;
		}
    }
		
?>

        </div>

    </div>
</div>
</body>

</html>