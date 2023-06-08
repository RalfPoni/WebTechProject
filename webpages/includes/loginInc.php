<?php

  if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = "user";

    include_once "../classes/loginClass.php";
    include_once "../classes/loginClassController.php";
    include_once "../classes/dbClass.php";

    echo "hello";

    $login = new LoginController($username, $password);
    $login->login();
    
  }
?>