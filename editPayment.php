<!DOCTYPE html>

<html>

<head>
    <style>
    input[type=text],
    select {
        width: 100%;
        padding: 10px 13px;
        margin: 3px 0;
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
    <title>Edit Payment</title>
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
                <h1 class="page-head-line">Payment Information
                    <button class="btn" align="center">
                        <a href="addPayment.php" class="btn">Add Payment</a>
                    </button>
                </h1>
            </div>
        </div>


        <?php 
	
include'connection.php';
	
	
	$id = "";
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		
		$receipt_no = $_GET["receipt_no"];
	}
		
	
	$sql = "SELECT receipt_no, client_insurance_no, date , amount, agent_email from payment where receipt_no='$receipt_no'";
	$result = $conn->query($sql);
	
	echo "<div>\n";
	
	  echo '<form action="updatePayment.php" method="post">';
	
	while($row = $result->fetch_assoc()) {
		echo "<label for=\"fname\">Receipt Number</label>";
	    echo "<input type=\"text\" receipt_no=\"fname\" name=\"receipt_no\" value=\"$row[receipt_no]\">";
		echo "<label for=\"fname\">Client Insurance Number</label>";
	    echo "<input type=\"text\" receipt_no=\"fname\" name=\"client_insurance_no\" value=\"$row[client_insurance_no]\">";
		echo "<label for=\"fname\">Amount</label>";
		echo "<input type=\"text\" receipt_no=\"fname\" name=\"amount\"  value=\"$row[amount]\">";
		echo "<label for=\"fname\">Date</label>";
		echo "<input type=\"text\" receipt_no=\"fname\" name=\"date\" value=\"$row[date]\">";
        echo "<label for=\"fname\">Agent email</label>";
		echo "<input type=\"text\" receipt_no=\"fname\" name=\"email\" value=\"$row[agent_email]\">";
		
    }
	
	echo "<input type=\"submit\" value=\"UPDATE\">";
	echo "</form>\n";
	
	
	
echo "</div>\n";
echo "\n";

	
?>

    </div>


    </div>

</body>

</html>