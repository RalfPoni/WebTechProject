<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Food Online Delivery</title>
  <link rel="stylesheet" type="text/css" href="styles2.css">
</head>
<body>
  <header>
    <h1>FOO</h1>
  </header>
  
  <nav>
    <ul>
      <li style="font-family:Lucida Console;"><a href='home.php'>Home</a></li>
      <li style="font-family:Lucida Console;"><a href='menu.php'>Menu</a></li>
      <li style="font-family:Lucida Console;"><a href='extras.php'>Extra</a></li>
      <li style="font-family:Lucida Console;"><a href='admin.php'>Add Food</a></li>
    </ul>
  </nav>
  <?php if(!empty($_SESSION)){ ?>
      <form action="includes/logoutInc.php" method="post">
      <li><input type="submit" name="submit" value="Log Out"></li>
      <?php } else { ?>
      <li><a href="signin.php" style="font-family:Lucida Console;">Sign In</a></li>
      <?php } ?>
  <?php if($_SESSION["role"] === 'admin') { ?>

  

   <section id="hero">
   <h2>Delete Food</h2>
    <form id="addFoodForm" action="includes/deleteFoodInc.php" method="POST" enctype="multipart/form-data">
        <label for="name">Food to delete:</label>
        <input type="text" name="name"><br>
        <br>

      <button type="submit" name="deleteSubmit">Delete Food</button>
    </form>
  </section>
  
  <?php } else { ?>

<section id="hero">
<h2 style="font-family:Lucida Console;">You do not have proper access to this page</h2>
<p style="font-family:Lucida Console;">If you think this is a mistake, please contact an administrator</p>
</section>

<?php } ?>

  <footer>
    <p>&copy; 2023 Food Delivery. All rights reserved.</p>
  </footer>

</body>
</html>