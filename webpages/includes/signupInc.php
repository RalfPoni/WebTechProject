<!-- <input type="text" name="firstName" placeholder="First Name" required>
      <input type="text" name="firstName" placeholder="Last Name" required>
      <input type="text" name="username" placeholder="Username" required>
       
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="passwordRepeat" placeholder="Confirm Password" required>
      <input type="submit" name="submit" value="Sign In"> -->

<?php
  
  if(isset($_POST['submit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRpt = $_POST['passwordRepeat'];
    $role = "user";

    include_once "../classes/signupClass.php";
    include_once "../classes/signupClassController.php";
    include_once "../classes/dbClass.php";

    $signup = new SignupController($firstName, $lastName, $username, $email
                                    ,$password, $passwordRpt, "user");
    $signup->signUp();
    
  }
?>