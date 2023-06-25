
<?php

  if (isset($_POST['deleteSubmit']))
  {
    include_once "../classes/dbClass.php";
    include_once "../classes/foodClass.php";
    
    $name = $_POST["name"];
    

    
    $food = new Food();
    $food->deleteFood($name);

    return $food;
  }

?>