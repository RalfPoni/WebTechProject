<?php
    if(isset($_POST["submit"])){
        echo "good";
        session_start();
        unset($_SESSION["username"]);
        unset($_SESSION["role"]);
        session_destroy();
        header("Location: ../signin.php");
        die();
    }
?>