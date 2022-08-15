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
    <title>Edit Agent</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <?php 
include 'header.php'; 
?>
    <div id="page-wrapper">

        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Agents Information
                </h1>
            </div>
        </div>

        <?php 

include'connection.php';
	
	
	$id = "";
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		
		$email = $_GET["email"];
		
		
	}
	$sql = "SELECT email,password, full_name, branch, mobile_no from agent where email='$email'";
	$result = $conn->query($sql);
	
	echo "<div>\n";
	
	  echo '<form action="updateAgent.php" method="post">';
	    echo "<label for=\"fname\">Agent Email</label>";
	    echo "<input type=\"text\" value=\"$email\"name=\"email\"/>"."</br>";
	while($row = $result->fetch_assoc()) {
        
		echo "<label for=\"fname\">Name</label>";
	    echo "<input type=\"text\" email=\"fname\" name=\"full_name\" placeholder=\"Your Name..\" value=\"$row[full_name]\">";
		echo "<label for=\"fname\">Branch</label>";
		echo "<input type=\"text\" email=\"fname\" name=\"branch\" placeholder=\"Your Branch..\" value=\"$row[branch]\">";
		echo "<label for=\"fname\">Phone</label>";
		echo "<input type=\"text\" email=\"fname\" name=\"mobile_no\" placeholder=\"Your Phone..\" value=\"$row[mobile_no]\">";
		
    }
	
	echo "<input type=\"submit\" value=\"UPDATE\">";
	echo "</form>\n";
	echo "<a href='deleteAgent.php?agent_email=".$email."'>Delete Agent</a>";
echo "</div>\n";
echo "\n";

?>


    </div>
    </div>

</body>

</html>