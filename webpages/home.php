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
      <li style="font-family:Lucida Console;"><a href='extras.php'>Extra</a></li>

      <?php
      if ($_SESSION["role"] === "admin") 
      {
        echo "<li style='font-family:Lucida Console';><a href='addfood.php'>Add Food</a></li>";
      }
      ?>
      
      <form action="includes/logoutInc.php" method="post">
      <li><input type="submit" name="submit" value="Log Out"></li>
    </ul>
  </nav>
  
 
   <section id="hero">
    <h2 style="font-family:Lucida Console;">Delicious Food Delivered to Your Doorstep</h2>
    <p style="font-family:Lucida Console;">Order online and enjoy a wide variety of tasty dishes.</p>
    <a style="font-family:Lucida Console;" href='menu.html' class="button">Order Now</a>
  </section>
   <p></p>
<section id="hero">
    <h2 style="font-family:Lucida Console;">Become part of FOO</h2>
    <p style="font-family:Lucida Console;">The ultimate platform to showcase your culinary delights to a hungry audience</p>
    <a style="font-family:Lucida Console;" href='admin.html' class="button">Start Serving</a>
  </section>
  </section>
  <p></p>
  <footer>
    <p style="font-family:Lucida Console;" >&copy; 2023 Food Online Delivery. All rights reserved.</p>
  </footer>

  <script src="script.js"></script>
</body>
</html>
