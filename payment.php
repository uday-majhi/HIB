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
    <title>Payments</title>
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
                <h1 class="page-head-line">Payment Informations
                    <button class="btn" align="center">
                        <a href="addPayment.php" class="btn">Add Payment</a>
                    </button>
                </h1>
            </div>
        </div>



        <?php

	
	$sql = "SELECT receipt_no,client_insurance_no,date,amount,agent_email FROM payment";
	$result = $conn->query($sql);
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>Receipt No.</th>\n";
    echo "    <th>Client Insurance No.</th>\n";
    echo "    <th>Date</th>\n";
    echo "    <th>Amount</th>\n";
	echo "    <th>Agent Email</th>\n";
    echo "  </tr>";
	
	if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>".$row["receipt_no"]."</td>\n";
		echo "    <td>".$row["client_insurance_no"]."</td>\n";
		echo "    <td>".$row["date"]."</td>\n";
		echo "    <td>".$row["amount"]."</td>\n";
		echo "    <td>".$row["agent_email"]."</td>\n";
        		
		if($row["agent_email"]== $username || "jyotirana@email.com" == $username){
			echo "<td>"."<a href='editPayment.php?receipt_no=".$row["receipt_no"]. "'>Edit</a>"."</td>\n";
		}else{
			echo "<td>"."<a class=\"dis\" href='editPayment.php?receipt_no=".$row["receipt_no"]. "'>Edit</a>"."</td>\n";
		}
		
		
	}
	
	echo "</table>\n";
	echo "\n";
	
	} else {
    echo "0 results";
}
$conn->close();
?>



    </div>

    </div>


</body>

</html>