
<?php

  if (isset($_POST['editSubmit']))
  {
    include_once "../classes/dbClass.php";
    include_once "../classes/foodClass.php";
    
    $name = $_POST["name"];
    $description = $_POST["description"];
    $type = $_POST["type"];
    $price = $_POST["price"];
    $image = $_FILES["image"]["name"];
    $findName = $_POST["findName"];

    

    
    $food = new Food();
    $food->editFood($name, $description, $type, $price, $image, $findName);

    return $food;
  }

?>