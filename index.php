<?php
session_start();

if(isset($_SESSION["email"])){
	header("Location: home.php");
	}
?>

<head>
    <style>
    .container {
        width: 450px;
        height: 700px;
        margin: auto;
        margin-top: 4%;
        padding-top: 1px;

    }

    .login-page {
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
    }

    .form {
        padding-top: 30px;
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 349px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.3), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
    }

    .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #4CAF50;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
    }

    .form button:hover,
    .form button:active,
    .form button:focus {
        background: #43A047;
    }




    img {
        margin-top: 0%;
        width: 20%;
        height: 20%;

    }
    </style>
    <title>Login Page</title>
</head>
<center>
    <h1 style="color:#ADD8E6">HEALTH INSURANCE BOARD</h1>
    <img src="./pics/pic.jpg" alt="">
</center>
<div class="container">
    <div class="login-page">
        <div class="form">
            <form class="login-form" action="login.php" method="POST">
                <input type="email" name="email" id="" placeholder="email" />
                <input type="password" name="password" id="" placeholder="password" />
                <button>login</button>
            </form>
        </div>
    </div>
</div>