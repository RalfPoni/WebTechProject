<!DOCTYPE html>
<?php
  session_start();
?>
<html>
<head>
  <title>Food Online Delivery</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
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
      if(!empty($_SESSION)) {
      if ($_SESSION["role"] === "admin") 
      {
        echo "<li style='font-family:Lucida Console';><a href='admin.php'>Add Food</a></li>";
      }
    }
    ?>
      
      <?php if(!empty($_SESSION)){ ?>
      <form action="includes/logoutInc.php" method="post">
      <li><input type="submit" name="submit" value="Log Out"></li>
      <?php } else { ?>
      <li><a href="signin.php">Sign In</a></li>
      <?php } ?>
    </ul>
  </nav>
  
 
   <section id="hero">
    <h2 style="font-family:Lucida Console;">Delicious Food Delivered to Your Doorstep</h2>
    <p style="font-family:Lucida Console;">Order online and enjoy a wide variety of tasty dishes.</p>
    <a style="font-family:Lucida Console;" href='menu.php' class="button">Order Now</a>
  </section>
   <p></p>
   <?php if($_SESSION["role"] === 'admin') { ?>
<section id="hero">
    <h2 style="font-family:Lucida Console;">Welcome back <?php echo $_SESSION["username"]; ?></h2>
    <a style="font-family:Lucida Console;" href='admin.php' class="button">Manage menu</a>
  </section>
  </section>
  <p></p>
  <footer>
    <p style="font-family:Lucida Console;" >&copy; 2023 Food Online Delivery. All rights reserved.</p>
  </footer>

  <?php } ?>

</body>
</html>
