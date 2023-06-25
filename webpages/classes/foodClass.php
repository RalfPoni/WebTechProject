<?php

include_once "../classes/dbClass.php";

class Food extends PDODB
{
    private $db;

    public function __construct() 
    {
        $this->db = new PDODB();
    }

    public function addFood($name, $description, $type, $price, $image)
    {
        $fileName = basename($image); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes))
        { 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = file_get_contents($image); 


            $statement = $this->connect()->prepare('INSERT INTO food (name, description, type, price, isSold, image) VALUES (?, ?, ?, ?, ?, ?);');

            $isSold = 0;
    
            if (!$statement->execute(array($name, $description, $type, $price, $isSold, $imgContent))) {
                $statement = null;
                die("Failed");
            }
        }

        header("Location: ../addfood.php");
        exit();
    }
}

?>