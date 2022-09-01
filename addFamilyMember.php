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
    <title>Add Client</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php
 include 'header.php';
session_start();

$client_insurance_no = $_GET["client_insurance_no"] ? $_GET["client_insurance_no"] : $_SESSION["client_insurance_no"];
$insurance_no;

?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Add Family Informations</h1>

            <form action="insertFamilyMember.php" method="post" enctype="multipart/form-data">
                <fieldset class="family_form_wrapper">
                    <?php
                $insurance_no = $client_insurance_no;
                    $sql = "SELECT full_name, client_insurance_no FROM client WHERE client_insurance_no='$insurance_no'";
                    $result_set = mysqli_query($conn, $sql);
                    $num_rows = mysqli_num_rows($result_set);

                    if ($num_rows > 0) {
                        $row = mysqli_fetch_assoc($result_set);
                        $client_name = $row["full_name"];
                        echo "Client($client_name): <input type=\"number\" name=\"client_insurance_no\" value=\"$insurance_no\" readonly />";
                    }
                ?>
                    Insurance no.: <input type="number" name="family_member_insurance_no" required> <br>
                    Name: <input type="text" name="family_member_name" required><br>
                    Gender: <select name="family_member_gender" id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                    Birth Date: <input type="date" name="family_member_birth_date" required><br>
                    Identity no: <input type="text" name="family_member_identity_no" required><br>
                    Relationship: <input type="text" name="family_member_relationship" required>
                    <select name="family_member_relationship" id="Fsp">
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
                    <br>
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

                    <div class="mt-2">
                        <input class="btn btn-success" type="submit" name="insertFamilyMember" value="Submit" />
                        <input class="btn btn-success" type="submit" name="insertFamilyMember_and_pay" value="Submit and Make
                        Payment" />
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</div>

<script>
const family_insurance_no_element = document.querySelector('[name=family_member_insurance_no]');
const identity_no_element = document.querySelector('[name=family_member_identity_no]');
const family_form_wrapper = document.querySelector('.family_form_wrapper');

const submitBtns = Array.from(document.querySelectorAll('[type="submit"]'));

document.addEventListener("DOMContentLoaded", async () => {
    const searchParams = new URL(document.location).searchParams;
    const insurance_no = searchParams.get("client_insurance_no");

    const res = await fetch(`/HIB/api/familyMembersCount.php?insurance_no=${insurance_no}`);
    const {
        count
    } = await res.json();

    if (count >= 10) {
        family_form_wrapper.setAttribute("disabled", "disabled");
        family_form_wrapper.setAttribute("title", "DISABLED: The family member's count must not exceed 9");
    }

})

family_insurance_no_element.addEventListener('blur', handleInsuranceElement);
identity_no_element.addEventListener('blur', handleIdentityElement);

async function handleInsuranceElement(e) {
    const {
        value
    } = e.currentTarget;

    const res = await fetch(`/HIB/api/familyMemberInsurance.php?insurance_no=${value}`);
    const {
        error
    } = await res.json();

    if (error) {
        alert(error);
    }
}

async function handleIdentityElement(e) {
    const {
        value
    } = e.currentTarget;

    const res = await fetch(`/HIB/api/identity.php?identity=${value}`);
    const {
        error
    } = await res.json();

    if (error) {
        alert(error);
    }
}
</script>