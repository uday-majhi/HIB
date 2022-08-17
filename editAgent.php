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
    <title>Add Client</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php include 'header.php'; 
$email = $_GET["email"];

if($email){
    $sql = "SELECT * FROM agent WHERE email='$email'";
    $resultSet = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($resultSet);

    $details = $row = mysqli_fetch_assoc($resultSet);
}

?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Edit Agent</h1>
            <form action="updateAgent.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="email" value="<?php echo $email ?>" />

                Email: <input type="email" name="insurance_no" value="<?php echo $details["email"]; ?>" readonly><br>
                Full Name: <input type="text" name="full_name" value="<?php echo $details["full_name"]; ?>"
                    required><br>
                Branch: <input type="text" name="branch" value="<?php echo $details["branch"]; ?>" required><br>
                Mobile No <input class="mobile_no" type="number" name="mobile_no"
                    value="<?php echo $details["mobile_no"]; ?>" required> </br>
                <input type="submit" name="editAgent" value="Update Details" />

            </form>

        </div>

    </div>

</div>

</body>

</html>