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
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Family Informations</h1>

            <form action="insertFamilyMember.php" method="post" enctype="multipart/form-data">
                Insurance no.: <input type="number" name="family_member_insurance_no" required> <br>
                Name: <input type="text" name="family_member_name" required><br>
                Gender: <select name="gender" id="family_member_gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Others</option>
                </select>
                Birth Date: <input type="date" name="family_member_birth_date" required><br>
                Identity no: <input type="text" name="family_member_identity_no" required><br>
                Relationship: <input type="text" name="family_member_relationship" required><br>
                Image: <input class="img" type="file" name="family_member_image" required> <br>
                First Service Point:
                <select name="family_member_fsp" id="Fsp">
                    <optgroup label="FSP">
                        <option value="BPKIHS">B.P.K.I.H.S</option>
                        <option value="Duhabi">Duhabi Nagar Aspatal</option>
                        <option value="Saterjhora">Saterjhora PHC</option>
                        <option value="Ithari">Ithari PHC</option>
                        <option value="Inaruwa">Inaruwa Hospital</option>
                        <option value="Barahchetra">Barahchetra Nagar Aspatal</option>
                        <option value="Chatra PHC">Chatra PHC</option>
                        <option value="Harinagra PHC">Harinagra PHC </option>
                        <option value="Madhuban PHC">Madhuban PHC</option>
                    </optgroup>
                </select>

                <input type="submit" name="insertFamilyMember" value="Submit" />
            </form>

        </div>
    </div>
</div>