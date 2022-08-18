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
<?php include 'header.php'; 
?>
<div id="page-wrapper">



    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Add Client</h1>

            <form action="insertClient.php" method="post" enctype="multipart/form-data">
                Insurance no.: <input type="number" name="client_insurance_no" required><br>
                Full Name: <input type="text" name="full_name" required><br>
                Email: <input type="email" name="email" required><br>
                Password: <input type="password" name="password" required><br>
                Gender: <select name="gender" id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Others</option>
                </select>
                Birth Date: <input type="date" name="birth_date" required><br>
                Citizenship no.: <input type="text" name="citizenship_no" required><br>
                Mobile no.: <input type="number" name="mobile_no" required><br>
                Address: <input type="text" name="address" required><br>
                Policy ID: <input type="text" name="policy_id" required><br>
                Agent ID: <input type="text" name="agent_email" value="<?php echo $_SESSION["email"]; ?>" required><br>
                Image <input class="img" type="file" name="client_image" required> </br>
                First Service Point:
                <select name="fsp" id="Fsp">
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

                <input type="submit" name="insertClient" value="Submit" />

            </form>

        </div>

    </div>


</div>

</body>

<script>
const insurance_no_element = document.querySelector('[name=client_insurance_no]');
const email_element = document.querySelector('[name=email]');
const citizenship_no_element = document.querySelector('[name=citizenship_no]');

insurance_no_element.addEventListener('blur', handleInsuranceElement);
email_element.addEventListener('blur', handleEmailElement);
citizenship_no_element.addEventListener('blur', handleCitizenshipElement);

async function handleInsuranceElement(e) {
    const {
        value
    } = e.currentTarget;

    const res = await fetch(`/HIB/api/insurance.php?table=client&client_insurance_no=${value}`);
    const {
        error
    } = await res.json();

    if (error) {
        alert(error);
    }
}

async function handleEmailElement(e) {
    const {
        value
    } = e.currentTarget;

    const res = await fetch(`/HIB/api/email.php?table=client&email=${value}`);
    const {
        error
    } = await res.json();

    if (error) {
        alert(error);
    }
}

async function handleCitizenshipElement(e) {
    const {
        value
    } = e.currentTarget;

    const res = await fetch(`/HIB/api/citizenship.php?table=client&citizenship=${value}`);
    const {
        error
    } = await res.json();

    if (error) {
        alert(error);
    }
}
</script>

</html>