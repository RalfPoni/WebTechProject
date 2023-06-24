<?php

include_once "../classes/dbClass.php";

class Food {
    private $db;

    public function __construct() {
        $this->db = new PDODB();
    }

    public function addFood($name, $description, $type, $price, $image) {
        
        $directory = 'uploads/';
        $permissions = 0666;

        if (!file_exists($directory)) {

            mkdir($directory, $permissions, true);

        }
        else 
        { 
            chmod($directory, $permissions);
        }

        $targetDir = "uploads/";
        $fileName = basename($image["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        if (!in_array(strtolower($fileType), $allowedTypes)) {
            header("Location: ../addfood.php?error=invalidfiletype");
            exit();
        }

        
        if (move_uploaded_file($image["tmp_name"], $targetFilePath)) {
            
            $query = "INSERT INTO food (name, description, type, price, image) VALUES (?, ?, ?, ?, ?)";
            $params = array($name, $description, $type, $price, $fileName);

            if ($this->db->executeQuery($query, $params)) {
                
                header("Location: ../admin_menu.php?success=1");
                exit();
            } else {
                
                header("Location: ../addfood.php?error=dberror");
                exit();
            }
        } else {
           
            header("Location: ../addfood.php?error=fileupload");
            exit();
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    
    $name = $_POST["name"];
    $description = $_POST["description"];
    $type = $_POST["type"];
    $price = $_POST["price"];
    $image = $_FILES["image"];

    $food = new Food();

    $food->addFood($name, $description, $type, $price, $image);
}
?>