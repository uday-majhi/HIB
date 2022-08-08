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
    <title>Add Nominee</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php 
include 'header.php'; 

$uniqueId2 = time().'-'.mt_rand();

if(isset($_GET["client_id"])){
$client_id       = $_GET["client_id"];
}else{ $client_id="";
}
?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Add Nominee</h1>




            <form action="insertNominee.php" method="post">

                Insurance no: <input type="text" name="family_member_insurance_no" value="" required><br>
                Name: <input type="text" name="family_member_name" required><br>
                GENDER: <input type="text" name="gender" required><br>
                Birth Date: <input type="text" name="family_member_birth_date" required><br>
                Identity No: <input type="text" name="family_member_identity_no" required><br>
                Relationship: <input type="text" name="family_member_relationship" required><br>
                First Service Point: <input type="text" name="fsp" required><br>
                Image: <input type="blob" name="family_member_image" required><br>

                <input type="submit">
            </form>



        </div>


    </div>



</div>

</body>

</html>