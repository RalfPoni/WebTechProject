<?php

    include_once "../classes/loginClass.php";

    class LoginController extends Login{
        private $username;
        private $password;

        public function __construct( $username ,$password){
                            
                        $this->username = $username;
                        $this->password = $password;
    
                                    }
        
        private function emptyInput() {
            if(empty($username) || empty($this->password)) {
                    return false;
                }
    
                return true;
        }

        public function login(){
            if($this->emptyInput()){
                die("Empty inputtt");
            }
        
            $this->getUser($this->username, $this->password);
            header("Location: ../signin.php");
            die();
        }
    }
?>