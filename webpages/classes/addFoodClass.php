<?php

include_once "../classes/dbClass.php";


class Food extends PDODB{

    
    private $db;

    public function __construct() 
    {
        $this->db = new PDODB();
        
    }

    
    public function addFood($name, $description, $type, $price, $imageTmpName) {

       

        $imageData = file_get_contents($imageTmpName);

        $statement = $this->db->connect()->prepare('INSERT INTO food (name, description, type, price, isSold, image) VALUES (?, ?, ?, ?, ?, ?);');

        $isSold = 0;

        if (!$statement->execute(array($name, $description, $type, $price, $isSold, $imageData))) {
            $statement = null;
            die("Failed");
        }

        header("Location: ../addfood.php");
        exit();
    }
}

?>