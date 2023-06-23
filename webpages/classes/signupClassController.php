<?php

class SignupController extends Signup{
    private $username;
    private $firstName;
    private $lastName;
    private $password;
    private $passwordRepeat;
    private $email;
    public function __construct($firstName, $lastName, $username, $email
                                ,$password, $passwordRepeat, $role){
                        
                    $this->firstName = $firstName;
                    $this->lastName = $lastName;
                    $this->username = $username;
                    $this->email = $email;
                    $this->password = $password;
                    $this->passwordRepeat = $passwordRepeat;


                                }
    
    private function emptyInput() {
        if(empty($this->firstName) || empty($this->lastName) || empty($username) || empty($this->password) ||
            empty($this->email) || empty($this->passwordRepeat)) {
                return false;
            }

            return true;
    }

    private function validName(){
        if(preg_match("/^[a-zA-Z'-]+$/", $this->firstName) && preg_match("/^[A-Z][A-Za-z]$/", $this->lastName)){
            return true;
     }

        return false;
    }
    private function validUser(){
        if(preg_match("/^[A-Za-z][A-Za-z0-9]{2,29}$/", $this->username)){
            return true;
        }

        return false;
    }

    private function validPassword(){
        if(preg_match("/^(?=.*[0-9])(?=.*[A-Z]).{8,32}$/", $this->password)){
            return true;
        }

        return false;
    }

    private function passwordMatch($password, $passwordRepeat){
        if($password == $passwordRepeat) {
            return true;
        } 
        return false;
    }

    public function signUp(){
        if($this->emptyInput()){
            die("Empty inputtt");
        }

      /*  if(!$this->validName()) {
            header("Location: ../signup.php?error=invalidName");
            exit();
        } */

        if(!$this->validPassword()) {
            header("Location: ../signup.php?error=invalidPassword");
            exit();
        }
        
        if(!$this->passwordMatch($this->password, $this->passwordRepeat)) {
            header("Location: ../signup.php?error=passwordsDontMatch");
            exit();
        }

        if(!$this->checkUser($this->username, $this->email)){
            header("Location: ../signup.php?error=userExists");
            exit();
        }

        if(!$this->validUser()) {
            header("Location: ../signup.php?error=invalidUsername");
            exit();
        }

        $this->setUser($this->firstName, $this->lastName, $this->username, $this->email,
                        $this->password, "user");
        header("Location: ../signin.php");
        die();
    }
}

?>