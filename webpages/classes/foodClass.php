<?php

include_once "../classes/dbClass.php";

class Food extends PDODB
{
    private $db;

    public function __construct() 
    {
        $this->db = new PDODB();
    }

    private function notEmpty($name, $description, $type, $price, $image){
        if(empty($name) || empty($description) || empty($type) || empty($price) || empty($image)){
            return false;
        }

        return true;
    }

    public function addFood($name, $description, $type, $price, $image)
    {
        $fileName = basename($image); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

        if(!$this->notEmpty($name, $description, $type, $price, $image)){
            header("Location: ../addfood.php?error=emptyValue");
            exit();
        }

        if(!is_numeric($price)){
            header("Location: ../addfood.php?error=invalidPrice");
            exit();
        }

        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes))
        { 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = file_get_contents($image); 


            $statement = $this->connect()->prepare('INSERT INTO food (name, description, type, price, isSold, image) VALUES (?, ?, ?, ?, ?, ?);');

            $isSold = 0;

            $filteredName = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
            $filteredDesc = filter_var($description, FILTER_SANITIZE_SPECIAL_CHARS);
            $filteredType = filter_var($type, FILTER_SANITIZE_SPECIAL_CHARS);
            $filteredPrice = filter_var($price, FILTER_SANITIZE_SPECIAL_CHARS);
            $filteredIsSold = filter_var($isSold, FILTER_SANITIZE_SPECIAL_CHARS);
    
            if (!$statement->execute(array($filteredName, $filteredDesc, $filteredType, $filteredPrice, $filteredIsSold, $imgContent))) {
                $statement = null;
                die("Failed");
            }
        }

        header("Location: ../addfood.php");
        exit();
    }

    public function editFood($name, $description, $type, $price, $image, $findName)
    {
        $fileName = basename($image); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

        if(!$this->notEmpty($name, $description, $type, $price, $image)){
            header("Location: ../addfood.php?error=emptyValue");
            exit();
        }

        if(!is_numeric($price)){
            header("Location: ../addfood.php?error=invalidPrice");
            exit();
        }

        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes))
        { 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = file_get_contents($image); 


            $statement = $this->connect()->prepare('UPDATE food SET name = ?, description = ?, type = ?, price = ?, isSold = ?, image = ? WHERE name = ?');

            $isSold = 0;

            $filteredName = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
            $filteredDesc = filter_var($description, FILTER_SANITIZE_SPECIAL_CHARS);
            $filteredType = filter_var($type, FILTER_SANITIZE_SPECIAL_CHARS);
            $filteredPrice = filter_var($price, FILTER_SANITIZE_SPECIAL_CHARS);
            $filteredIsSold = filter_var($isSold, FILTER_SANITIZE_SPECIAL_CHARS);
            $filteredFindName = filter_var($findName, FILTER_SANITIZE_SPECIAL_CHARS);
    
            if (!$statement->execute(array($filteredName, $filteredDesc, $filteredType, $filteredPrice, $filteredIsSold, $imgContent, $filteredFindName))) {
                $statement = null;
                header("Location: ../editfood.php?error=failedToExecute");
                exit();
            }
        }

        header("Location: ../editfood.php");
        exit();
    }

    public function deleteFood($name){
        $statement = $this->connect()->prepare('DELETE FROM food WHERE name = ?');
        $filteredName = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
        if(!$statement->execute(array($filteredName))) {
            $statement = null;
            header("Location: ../deletefood.php?error=foodNotFound");
            exit();
        }

        header("Location: ../deletefood.php");
        exit();
    }
}

?>