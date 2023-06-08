<?php

// CREATE TABLE `user` (
//     `firstName` varchar(255) NOT NULL,
//     `lastName` varchar(255) NOT NULL,
//     `username` varchar(255) NOT NULL,
//     `email` varchar(255) NOT NULL,
//     `password` varchar(1000) NOT NULL,
//     `role` varchar(255) NOT NULL
//   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    include_once "../classes/dbClass.php";   

    class Signup extends PDODB{
        protected function checkUser($username, $email){
            $statement = $this->connect()->prepare('SELECT username FROM user WHERE username = ? OR email = ?;');

            if(!$statement->execute(array($username, $email))){
                $statement = null;
                die("Failed");
        }

        if($statement->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }

        protected function setUser($firstName, $lastName, $username, $email, $password, $role) {
            $statement = $this->connect()->prepare('INSERT INTO user (firstName, lastName, username, email, password, role) VALUES (?, ?, ?, ?, ?, ?);');

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            if(!$statement->execute(array($firstName, $lastName, $username, $email, $hashedPassword, $role))) {
                $statement = null;
                die("Failed");
            }
        }
    }
?>