<!DOCTYPE html>
<html>

<head>
    <style>
    input,
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
    <title>Edit Client Member</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php include 'header.php'; 
$insurance_no = $_GET["insurance_no"];
echo"$insurance_no";

if($insurance_no){
    $sql = "SELECT * FROM nominee WHERE insurance_no='$insurance_no'";
    $resultSet = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($resultSet);

    $details = $row = mysqli_fetch_assoc($resultSet);
}

?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Edit Member Client</h1>

            <form action="updateNominee.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="insurance_no" value="<?php echo $insurance_no ?>" />

                Insurance no.: <input type="number" name="insurance_no" value="<?php echo $details["insurance_no"]; ?>"
                    readonly><br>
                Full Name: <input type="text" name="full_name" value="<?php echo $details["full_name"]; ?>"
                    required><br>
                Gender: <select name="gender" id="gender" value="<?php echo $details["gender"]; ?>">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Others</option>
                </select>
                Birth Date: <input type="date" name="birth_date" value="<?php echo $details["birth_date"]; ?>"
                    required><br>
                Identity No.: <input type="text" name="identity_no" value="<?php echo $details["identity_no"]; ?>"
                    required><br>
                Relationship: <input type="text" name="relationship" value="<?php echo $details["relationship"]; ?>"
                    required><br>

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
                Image <input class="img" type="file" name="client_image" value="<?php echo $details["image"]; ?>"
                    required> </br>

                <input type="submit" name="editNominee" value="Update Details" />

            </form>

        </div>

    </div>

</div>

</body>

</html>