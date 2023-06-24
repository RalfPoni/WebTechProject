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
     <li><a href='admin_home.php'>Home</a></li>
      <li><a href='admin_menu.php'>Menu</a></li>
      <li><a href='admin_extras.php'>Extra</a></li>
      <li><a href='addfood.php'>Add Food</a></li>
    </ul>
  </nav>

   <section id="hero">
   <h2>Add Food</h2>
    <form id="addFoodForm" action="webpage/classes/addFoodClass.php" method="POST" enctype="multipart/form-data">
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

      <button type="submit">Add Food</button>
    </form>
  </section>

  <footer>
    <p>&copy; 2023 Food Delivery. All rights reserved.</p>
  </footer>

  <script src="script.js"></script>
</body>
</html>
