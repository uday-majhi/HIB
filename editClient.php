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
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php include 'header.php'; 
$client_insurance_no = $_GET["client_insurance_no"];

if($client_insurance_no){
    $sql = "SELECT * FROM client WHERE client_insurance_no='$client_insurance_no'";
    $resultSet = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($resultSet);

    $details = $row = mysqli_fetch_assoc($resultSet);
}

?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Add Client</h1>

            <form action="updateClient.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="client_insurance_no" value="<?php echo $client_insurance_no ?>" />

                Insurance no.: <input type="number" name="insurance_no"
                    value="<?php echo $details["client_insurance_no"]; ?>" readonly><br>
                Full Name: <input type="text" name="full_name" value="<?php echo $details["full_name"]; ?>"
                    required><br>
                Email: <input type="email" name="email" value="<?php echo $details["email"]; ?>" required><br>
                Gender: <select name="gender" id="gender" value="<?php echo $details["gender"]; ?>">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Others</option>
                </select>
                Birth Date: <input type="date" name="birth_date" value="<?php echo $details["birth_date"]; ?>"
                    required><br>
                Citizenship no.: <input type="text" name="citizenship_no"
                    value="<?php echo $details["citizenship_no"]; ?>" required><br>
                Mobile no.: <input type="number" name="mobile_no" value="<?php echo $details["mobile_no"]; ?>"
                    required><br>
                Address: <input type="text" name="address" value="<?php echo $details["address"]; ?>" required><br>
                Policy ID: <input type="text" name="policy_id" value="<?php echo $details["policy_id"]; ?>"
                    required><br>
                Agent ID: <input type="text" name="agent_email" value="<?php echo $details["agent_email"]; ?>"
                    required><br>
                Image <input class="img" type="file" name="client_image" value="<?php echo $details["image"]; ?>"
                    required> </br>
                First Service Point:
                <select name="fsp" id="Fsp">
                    <optgroup label="FSP">
                        <option value="BPKIHS" <?php echo $details["fsp"] === 'BPKIHS' ? "selected" : "" ?>>
                            B.P.K.I.H.S</option>
                        <option value="Duhabi" <?php echo $details["fsp"] === "Duhabi" ? "selected" : "" ?>>
                            Duhabi Nagar Aspatal</option>
                        <option value="Saterjhora" <?php echo $details["fsp"] === "Saterjhora" ? "selected" : "" ?>>
                            Saterjhora PHC
                        </option>
                        <option value="Ithari" <?php echo $details["fsp"] === "Ithari" ? "selected" : "" ?>>
                            Ithari PHC</option>
                        <option value="Inaruwa" <?php echo $details["fsp"] === "Inaruwa" ? "selected" : "" ?>>
                            Inaruwa Hospital</option>
                        <option value="Barahchetra" <?php echo $details["fsp"] === "Barahchetra" ? "selected" : "" ?>>
                            Barahchetra Nagar
                            Aspatal</option>
                        <option value="Chatra PHC" <?php echo $details["fsp"] === "Chatra PHC" ? "selected" : "" ?>>
                            Chatra PHC</option>
                        <option value="Harinagra PHC"
                            <?php echo $details["fsp"] === 'Harinagra PHC' ? "selected" : "" ?>>Harinagra PHC
                        </option>
                        <option value="Madhuban PHC" <?php echo $details["fsp"] === "Madhuban PHC" ? "selected" : "" ?>>
                            Madhuban PHC
                        </option>
                    </optgroup>
                </select>

                <input type="submit" name="editClient" value="Update Details" />

            </form>

        </div>

    </div>
    <!-- /. PAGE WRAPPER  -->


</div>
<!-- /. WRAPPER  -->





</body>

</html>