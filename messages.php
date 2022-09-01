<?php
    session_start();
     $errorMessage = $_SESSION["error"];
     $successMessage = $_SESSION["success"];

     if($errorMessage && $errorMessage != null){
         echo "<input type=\"hidden\" name=\"error\" value=\"$errorMessage\" />";
     }

     if($successMessage && $successMessage != null){
         echo "<input type=\"hidden\" name=\"success\" value=\"$successMessage\" />";
     }

     $_SESSION["error"] = null;
     $_SESSION["success"] = null;
?>