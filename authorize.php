<?php
session_start();
$loggedInUser = $_SESSION["email"];

if ($loggedInUser != 'jyotirana@email.com') {
  header("Location: home.php");
  exit();
}