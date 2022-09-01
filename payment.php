<?php
session_start();
$role = $_SESSION["role"];
if ($role !== "agent") {
    header("location: /HIB/home.php");
    exit();
}
?>

<!DOCTYPE html>

<html>

<head>
    <style>
    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        margin-left: 2%;

        float: center;
    }

    button {

        float: right;
        color: white;
        text-decoration: none;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        margin-left: 0%;
        font-size: 110%;
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

    .dis {
        pointer-events: none;
        cursor: default;
        color: #595959;
    }
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payments</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <?php include 'header.php';
    session_start();
    ?>
    <div id="page-wrapper">

        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Payment Informations

                </h1>
            </div>
        </div>



        <?php


        $sql = "SELECT receipt_no,client_insurance_no,date,amount,agent_email,status FROM payment";
        $result = $conn->query($sql);

        function getStatusButton($status, $client_insurance_no){
            if($status === "APPROVED"){
                return "<a style=\"margin-left: 0.5rem\" class=\"btn btn-primary\" disabled>APPROVED</a>";
            }
            if($status === "DECLINED"){
                return "<a style=\"margin-left: 0.5rem\" class=\"btn btn-primary\" disabled>DECLINED</a>";
            }

            return "
                <a href=\"paymentStatus.php?action=approve&client_insurance_no=" . $client_insurance_no . "\" style=\"margin-left: 0.5rem\" class=\"btn btn-primary\">Approve</a> 
                <a href=\"paymentStatus.php?action=decline&client_insurance_no=" . $client_insurance_no . "\" style=\"margin-right: 0.5rem\" class=\"btn btn-primary\">Decline</a>";
        }

        echo "<table class=\"table\">\n";
        echo "  <tr>\n";
        echo "    <th>Receipt No.</th>\n";
        echo "    <th>Client Insurance No.</th>\n";
        echo "    <th>Date</th>\n";
        echo "    <th>Amount</th>\n";
        echo "    <th>Agent Email</th>\n";
        echo "    <th>Status</th>\n";
        echo "    <th>Action</th>\n";
        echo "  </tr>";

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {

                echo "<tr>\n";
                echo "    <td>" . $row["receipt_no"] . "</td>\n";
                echo "    <td>" . $row["client_insurance_no"] . "</td>\n";
                echo "    <td>" . $row["date"] . "</td>\n";
                echo "    <td>" . $row["amount"] . "</td>\n";
                echo "    <td>" . $row["agent_email"] . "</td>\n";
                echo "    <td>" . $row["status"] . "</td>\n";

                if ($_SESSION["email"] == "jyotirana@email.com") {
                    echo "<td>
                        <a class=\"btn btn-primary\" style=\"margin-right: 0.5rem\" href=\"editPayment.php?receipt_no=" . $row["receipt_no"] . "\">Edit</a>
                    <a class=\"btn btn-primary\" href=\"deletePayment.php?receipt_no=" . $row["receipt_no"] . "\">Delete</a>" .
                    getStatusButton($row["status"], $row["client_insurance_no"]).
                        "</td>\n";
                } else {
                    echo "<td>Not Authorized</td>";
                }
            }

            echo "</table>\n";
            echo "\n";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>



    </div>

    </div>


</body>

</html>