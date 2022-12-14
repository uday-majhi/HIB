<?php
    session_start();
    $role = $_SESSION["role"];
    if($role !== "agent"){
        header("location: /HIB/home.php");
        exit();
    }
?>

<!DOCTYPE html>

<html>

<head>
    <style>
    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        margin-left: 2%;
        display: block;
        float: center;
    }

    button {
        background-color: #4CAF50;
        float: right;
        color: white;
        text-decoration: none;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        margin-left: 0%;
        font-size: 110%;
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

    .dis {
        pointer-events: none;
        cursor: default;
        color: #595959;
    }

    .searchBox {

        cursor: pointer;
        font-size: 85%;

    }
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clients</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <?php include 'header.php'; 
    include 'connection.php';
?>
    <div id="page-wrapper">

        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Client Informations
                </h1>
            </div>
        </div>


        <?php

	$sql = "SELECT client_insurance_no, full_name, gender, birth_date, citizenship_no, mobile_no, address, email, policy_id, agent_email, fsp FROM client";
	
    try{
        $result = $conn->query($sql);
    }catch(Exception $e){
        echo $e;
    }
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>Insurance No.</th>\n";
    echo "    <th>Name</th>\n";
    echo "    <th>Birth Date</th>\n";
    echo "    <th>Gender</th>\n";
    echo "    <th>Citizenship no.</th>\n";
    echo "    <th>Mobile No</th>\n";
	echo "    <th>Address</th>\n";
	echo "    <th>Email</th>\n";
	echo "    <th>Policy</th>\n";
	echo "    <th>Agent</th>\n";
	echo "    <th>FSP</th>\n";
	echo "    <th>Action</th>\n";
    echo "  </tr>";
	
	if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>"."<a href='/HIB/nominee.php?client_insurance_no=".$row["client_insurance_no"]."'>".$row["client_insurance_no"]."</a>"."</td>\n";
		echo "    <td>".$row["full_name"]."</td>\n";
		echo "    <td>".$row["birth_date"]."</td>\n";
		echo "    <td>".$row["gender"]."</td>\n";
		echo "    <td>".$row["citizenship_no"]."</td>\n";
		echo "    <td>".$row["mobile_no"]."</td>\n";
		echo "    <td>".$row["address"]."</td>\n";
		echo "    <td>".$row["email"]."</td>\n";
		echo "    <td>".$row["policy_id"]."</td>\n";
		echo "    <td>".$row["agent_email"]."</td>\n";
		echo "    <td>".$row["fsp"]."</td>\n";
		if($_SESSION["email"] === $row["agent_email"] || $_SESSION["email"] === "jyotirana@email.com"){
            echo "<td>".
                "<a href='editClient.php?client_insurance_no=".$row["client_insurance_no"]. "'>Edit</a>"."|".
                "<a href='clientStatus.php?client_insurance_no=".$row["client_insurance_no"]. "'>Status</a>"."|".
                "<a href='/HIB/addPayment.php?client_insurance_no=".$row["client_insurance_no"]. "'>Renew</a>".
             "</td>\n";
        }else{
            echo "<td>N/A</td>";
        }

	}
	}
?>

    </div>

    <?php include "messages.php"; ?>
    <script src="messages.js"></script>

</body>

</html>