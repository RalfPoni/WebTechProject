<?php

class SignupController extends Signup{
    private $username;
    private $firstName;
    private $lastName;
    private $password;
    private $passwordRepeat;
    private $email;
    public function __construct($firstName, $lastName, $username, $email
                                ,$password, $passwordRepeat){
                        
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
        
        if(!$this->passwordMatch($this->password, $this->passwordRepeat)) {
            die("Passwords don't match");
        }

        if(!$this->checkUser($this->username, $this->email)){
            die("Username/Email is already taken");
        }


        $this->setUser($this->firstName, $this->lastName, $this->username, $this->email,
                        $this->password, "user");
        header("Location: ../signin.php");
        die();
    }
}

?>