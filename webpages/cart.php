<!DOCTYPE html>
<?php
  session_start();
?>
<html>
<head>
  <title>Food Online Delivery</title>
  <link rel="stylesheet" type="text/css" href="styles1.css">
</head>
<body>
  <header>
    <h1 style="font-family:Lucida Console;">FOO</h1>
  </header>

  <nav>
    <ul>
      <li style="font-family:Lucida Console;"><a href='home.php'>Home</a></li>
      <li style="font-family:Lucida Console;"><a href='menu.php'>Menu</a></li>
      <li style="font-family:Lucida Console;"><a href='cart.php'>Cart</a></li>
      <li style="font-family:Lucida Console;"><a href='extras.php'>Extra</a></li>

      <?php
      if(!empty($_SESSION)){
      if ($_SESSION["role"] === "admin") 
      {
        echo "<li style='font-family:Lucida Console';><a href='admin.php'>Add Food</a></li>";
      }
    }
      ?>
    </ul>
  </nav>
  
 
  <h1 style="font-family: Lucida Console; color:green">Cart</h1>
  <?php include 'classes/searchFood.php';

    $foodSearch = new FoodSearch();
    $foodSearch->displayCart();
   ?>

   
  <footer>
    <p style="font-family:Lucida Console;">&copy; 2023 Food Delivery. All rights reserved.</p>
  </footer>

  <script src="scripts/cartScript.js"></script>
</body>
</html>


