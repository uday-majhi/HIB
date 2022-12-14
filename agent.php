<?php
    session_start();
    $role = $_SESSION["role"];
    if($role !== "agent"){
        ("location: /HIB/home.php");
        exit();
    }
    include "authorize.php";
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
        float: right;
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
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agents</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <?php include 'header.php'; 
?>
    <div id="page-wrapper">

        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Agents Information
                    <?php    
			if ($_SESSION["email"]=="jyotirana@email.com") {
			// echo '<button class="btn btn-success" align="center">';
            // echo '<a href="addAgent.php" class="btn btn-success">Add Agent</a>';
            // echo '</button>';
			}
			?>
                </h1>
            </div>
        </div>

        <?php

include'connection.php';
	
	$sql = "SELECT email, full_name, branch, mobile_no FROM agent";
	$result = $conn->query($sql);
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>Email</th>\n";
    echo "    <th>Name</th>\n";
    echo "    <th>Branch</th>\n";
    echo "    <th>Mobile Number</th>\n";
    echo "    <th>Action</th>\n";
    echo "     <th>Remove</th>\n";
    echo "  </tr>";
	
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>".$row["email"]."</td>\n";
		echo "    <td>".$row["full_name"]."</td>\n";
		echo "    <td>".$row["branch"]."</td>\n";
		echo "    <td>".$row["mobile_no"]."</td>\n";
        echo "<td>". "<a href='editAgent.php?email=".$row["email"]. "'>Edit</a>"."</td>\n";
        echo "<td>". "<a href='deleteAgent.php?email=".$row["email"]. "'>Delete</a>"."</td>\n";
	}
	
	echo "</table>\n";
	echo "\n";
}
$conn->close();
?>


    </div>
    </div>
    <?php include "messages.php"; ?>
    <script src="messages.js"></script>
</body>

</html>