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
    <title>Add Payment</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php include 'header.php'; 

$client_insurance_no = $_GET["client_insurance_no"];

?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Add Payment</h1>



            <form action="insertPayment.php" method="post">
                <?php
                    $sql = "SELECT full_name, client_insurance_no FROM client WHERE client_insurance_no='$client_insurance_no'";
                    
                    $result_set = mysqli_query($conn, $sql);
                    $num_rows = mysqli_num_rows($result_set);

                    if ($num_rows > 0) {
                        $row = mysqli_fetch_assoc($result_set);
                        $client_name = $row["full_name"];
                        echo "Client($client_name): <input type=\"number\" name=\"client_insurance_no\" value=\"$client_insurance_no\" />";
                    }
                ?>

                Recipt No: <input type="text" name="receipt_no" required><br>
                Date: <input type="date" name="date" required><br>
                Amount: <input type="number" name="amount" required><br>
                Agent Email: <input type="text" name="agent_email" value="<?php echo $_SESSION["email"]; ?>"
                    required><br>

                <input type="submit">
            </form>


        </div>


    </div>


</div>


<script>
const client_insurance_no_select = document.querySelector('[name=client_insurance_no]');
const amount_element = document.querySelector('[name=amount]');

document.addEventListener('DOMContentLoaded', async e => {
    const {
        value: insurance_no
    } = e.currentTarget;

    const res = await fetch(
        `api/getPaymentDetails.php?client_insurance_no=${insurance_no}`);
    const {
        amount_to_be_paid
    } = await res.json();

    amount_element.value = amount_to_be_paid;
})

client_insurance_no_select.addEventListener('blur', handleInsuranceElement);

async function handleInsuranceElement(e) {
    const {
        value
    } = e.currentTarget;

    const res = await fetch(`/HIB/api/insurance.php?table=payment&client_insurance_no=${value}`);
    const {
        error
    } = await res.json();

    if (error) {
        alert(error);
    }
}
</script>

</body>

</html>