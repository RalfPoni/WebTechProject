
<?php

  if (isset($_POST['addSubmit']))
  {
    include_once "../classes/dbClass.php";
    include_once "../classes/foodClass.php";
    
    $name = $_POST["name"];
    $description = $_POST["description"];
    $type = $_POST["type"];
    $price = $_POST["price"];
    $image = $_FILES["image"]["name"];

    

    
    $food = new Food();
    $food->addFood($name, $description, $type, $price, $image);

    return $food;
  }

?>
