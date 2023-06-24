<?php
include_once "../classes/dbClass.php";   

    class Login extends PDODB {
        protected function getUser($username, $password){
            $statement = $this->connect()->prepare('SELECT password FROM user WHERE username = ? OR email = ?;');

            if(!$statement->execute(array($username, $username))){
                $statement = null;
                header("Location: ../signin.php?error=statementfailed");
                exit();
            }

            if($statement->rowCount() == 0) {
                $statement = null;
                header("Location: ../signin.php?error=usernotfound");
                exit();
            }

            $hashPass = $statement->fetchAll(PDO::FETCH_ASSOC);

            $checkPass = password_verify($password, $hashPass[0]["password"]);

            if($checkPass == false){
                echo "Failed";
                $statement = null;
                header("Location: ../signin.php?error=wrongpassword");
                exit();
            } else {
                $statement = $this->connect()->prepare('SELECT * FROM user WHERE username = ? OR email = ? and password = ?;');
                if(!$statement->execute(array($username, $username, $hashPass[0]["password"]))){
                    $statement = null;
                    header("Location: ../signin.php?error=statementfailed");
                }

                if($statement->rowCount() == 0){
                    $statement = null;
                    header("Location: ../signin.php?error=usernotfound");
                    exit();
                }
                
                $statement->execute(array($username, $username, $hashPass[0]["password"] ));
                $user = $statement->fetch(PDO::FETCH_ASSOC);
                $role = $user["role"];
    
                session_start();
                $_SESSION["username"] = $user["username"];

                if ($role === 'admin') {
                    $_SESSION['role'] = 'admin';
                } else {
                    $_SESSION['role'] = 'user';
                }
                header("Location: ../home.php");
                exit();


                
            }
        }
    }

?>

