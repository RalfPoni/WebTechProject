
<?php
  
  echo "Hello1";
  if (isset($_POST['addSubmit']))
  {
    echo "Hello";
    $name = $_POST["name"];
    $description = $_POST["description"];
    $type = $_POST["type"];
    $price = $_POST["price"];
    $image = $_FILES["image"];
    $imageTmpName = $image["tmp_name"];

    include_once "../classes/addFoodClass.php";
    include_once "../classes/dbClass.php";

    
    $food = new Food();
    $food->addFood($name, $description, $type, $price, $imageTmpName);
    echo "Hello";
  }

?>
