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
    <title>Edit Nominee</title>

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
                <h1 class="page-head-line">Nominee Information
                    <button class="btn" align="center">
                        <a href="addNominee.php" class="btn">Add Nominee</a>
                    </button>
                </h1>
            </div>
        </div>


        <?php 

   include'connection.php';
	
	
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		
		$insurance_no = $_GET["insurance_no"];	
	}
	
	$sql = "SELECT * from nominee where nominee='$nominee'";
	$result = $conn->query($sql);
	
	echo "<div>\n";
	
	  echo '<form action="updateNominee.php" method="post">';
	   
	while($row = $result->fetch_assoc()) {
		
		echo "<label for=\"fname\">Insurance No.</label>";
	    echo "<input type=\"text\" insurance_no=\"fname\" name=\"insurance_no\" placeholder=\"nominee id..\" value=\"$row[insurance_no]\">";
		echo "<label for=\"fname\">Client Insurance No.</label>";
	    echo "<input type=\"text\" insurance_no=\"fname\" name=\"client_insurance_no\" placeholder=\"client insurance No..\" value=\"$row[client_insurance_no]\">";
		echo "<label for=\"fname\">Name</label>";
	    echo "<input type=\"text\" insurance_no=\"fname\" name=\"name\" placeholder=\"Name..\" value=\"$row[name]\">";
		echo "<label for=\"fname\">Gender</label>";
		echo "<input type=\"text\" insurance_no=\"fname\" name=\"gender\" placeholder=\"gender..\" value=\"$row[gender]\">";
		echo "<label for=\"fname\">Birth Date</label>";
		echo "<input type=\"text\" insurance_no=\"fname\" name=\"birth_date\" placeholder=\"Birth Date..\" value=\"$row[birth_date]\">";
		echo "<label for=\"fname\">Identity_no</label>";
		echo "<input type=\"text\" insurance_no=\"fname\" name=\identity_no\" placeholder=\"nominees identity_no..\" value=\"$row[identity_no]\">";
		echo "<label for=\"fname\">Relationship</label>";
		echo "<input type=\"text\" insurance_no=\"fname\" name=\"relationship\" placeholder=\"Relationship With Client..\" value=\"$row[relationship]\">";
		echo "<label for=\"fname\">First Service Point</label>";
		echo "<input type=\"text\" insurance_no=\"fname\" name=\"fsp\" placeholder=\"First Service Point..\" value=\"$row[fsp]\">";
		
		
    }
	
	
	echo "<input type=\"submit\" value=\"UPDATE\">";
	echo "</form>\n";
	echo "<a href='deleteNominee.php?insurance_no=".$insurance_no."'>Delete Member</a>";
	
	
	
echo "</div>\n";
echo "\n";

	
?>


    </div>


    </div>

</body>

</html>