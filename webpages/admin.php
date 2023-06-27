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
      
      <?php if(!empty($_SESSION)){ ?>
      <form action="includes/logoutInc.php" method="post">
      <li><input type="submit" name="submit" value="Log Out"></li>
      <?php } else { ?>
      <li><a href="signin.php">Sign In</a></li>
      <?php } ?>
    </ul>
  </nav>
  
 
  <?php if($_SESSION["role"] === 'admin') { ?>
   <section id="hero">
    <h2 style="font-family:Lucida Console;">Welcome back <?php echo $_SESSION["username"]; ?></h2>
  </section>
   <p></p>
<section id="hero">
    <a style="font-family:Lucida Console;" href='addfood.php' class="button">Add to Menu</a>
    <a style="font-family:Lucida Console;" href='editfood.php' class="button">Edit menu</a>
    <a style="font-family:Lucida Console;" href='deletefood.php' class="button">Delete from menu</a>
  </section>
  </section>
  <p></p>
  <footer>
    <p style="font-family:Lucida Console;" >&copy; 2023 Food Online Delivery. All rights reserved.</p>
  </footer>

  <?php } else { ?>

<section id="hero">
<h2 style="font-family:Lucida Console;">You do not have proper access to this page</h2>
<p style="font-family:Lucida Console;">If you think this is a mistake, please contact an administrator</p>
</section>

<?php } ?>

</body>
</html>
