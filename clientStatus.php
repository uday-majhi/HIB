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

    /* 
    .btn {
        background-color: #4CAF50;
        float: right;
        color: white;
        text-decoration: none;
    } */

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
                <h1 class="page-head-line">Client Status
                </h1>
            </div>
        </div>


        <?php

		$client_insurance_no = $_GET["client_insurance_no"];

	$sql = "SELECT c.client_insurance_no, c.full_name, c.gender, c.mobile_no, c.address, c.policy_id, c.agent_email, c.fsp, p.policy_name, pay.date FROM client c LEFT JOIN policy p ON p.policy_id = c.policy_id LEFT JOIN payment pay ON pay.client_insurance_no = c.client_insurance_no WHERE c.client_insurance_no = '$client_insurance_no';";
	
    try{
        $result = $conn->query($sql);
    }catch(Exception $e){
        echo $e;
    }
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>Insurance No.</th>\n";
    echo "    <th>Name</th>\n";
    echo "    <th>Gender</th>\n";
    echo "    <th>Mobile No</th>\n";
	echo "    <th>Address</th>\n";
	echo "    <th>Policy</th>\n";
	echo "    <th>Agent</th>\n";
	echo "    <th>FSP</th>\n";
	echo "    <th>Status</th>\n";
	echo "    <th>Expiry Date</th>\n";
    echo "  </tr>";

	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$payment_date = $row["date"];

		$payment_year = explode("-", $payment_date)[0]; // 2022-03-26 => 2022
		$payment_month = explode("-", $payment_date)[1]; // 2022-03-26 => 03
		$payment_day = explode("-", $payment_date)[2]; // 2022-03-26 => 26
		 
		$service_expiry_year = (int)$payment_year + 1;
		$service_expiry_date = "$service_expiry_year-$payment_month-$payment_day";

		$service_expiry = new DateTime($service_expiry_date);
		$current_date = new DateTime(date('y-m-d'));
		
		$status = $current_date <= $service_expiry ? "ACTIVE" : "DEACTIVATED";

		echo "<tr>\n";
		echo "    <td>"."<a href='/HIB/nominee.php?client_insurance_no=".$row["client_insurance_no"]."'>".$row["client_insurance_no"]."</a>"."</td>\n";
		echo "    <td>".$row["full_name"]."</td>\n";
		echo "    <td>".$row["gender"]."</td>\n";
		echo "    <td>".$row["mobile_no"]."</td>\n";
		echo "    <td>".$row["address"]."</td>\n";
		echo "    <td>".$row["policy_name"]."</td>\n";
		echo "    <td>".$row["agent_email"]."</td>\n";
		echo "    <td>".$row["fsp"]."</td>\n";
		echo "    <td>".$status."</td>\n";
		echo "    <td>".$service_expiry_date."</td>\n";
	

	}
}
?>


    </div>

</body>

</html>