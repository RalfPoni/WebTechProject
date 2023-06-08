<?php

    class PDODB {

    protected function connect() {
        $dbHost = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "epokafoodorder";
        
            try{
                return $pdo = new PDO("mysql:host=" . $dbHost . ";dbname=" . $dbName, $dbUsername, $dbPassword);
            } catch (PDOException $e){
                die("Failed to connect with MySQL");
            }
    }
}

?>
