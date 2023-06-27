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
      <li style="font-family:Lucida Console;"><a href='extras.php'>Extra</a></li>

      <?php
      if(!empty($_SESSION)){
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
      <li><a href="signin.php" style="font-family:Lucida Console;">Sign In</a></li>
      <?php } ?>

    </ul>
  </nav>
  
 
  <h1>Menu</h1>


  <input type="text" id="searchInput" placeholder="Search by food name">
  <button onclick="searchFood()">Search</button>

  <?php include 'classes/createTypeFilter.php'; ?>


  <select id="priceOrder" onchange="searchFood()">
    <option value="">Order by Price</option>
    <option value="asc">Ascending</option>
    <option value="desc">Descending</option>
  </select>
  
  <div id="resultsContainer" class="menu"></div>
  <footer>
    <p style="font-family:Lucida Console;">&copy; 2023 Food Delivery. All rights reserved.</p>
  </footer>

  <script src="scripts/searchScript.js"></script>
</body>
</html>
