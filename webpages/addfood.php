<!DOCTYPE html>
<?php
  session_start();
?>
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

  <?php if($_SESSION["role"] === 'admin') { ?>

   <section id="hero">
   <h2>Add Food</h2>
    <form id="addFoodForm" action="includes/addFoodInc.php" method="POST" enctype="multipart/form-data">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required><br>

      <label for="description">Description:</label>
      <textarea id="description" name="description" required></textarea><br>

      <label for="type">Type:</label>
      <input type="text" id="type" name="type" required><br>

      <label for="price">Price:</label>
      <input type="number" id="price" name="price" step="0.01" required><br>

      <label for="image">Image:</label>
      <input type="file" id="image" name="image" accept="image/*" required><br>

      <button type="submit" name="addSubmit">Add Food</button>
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
