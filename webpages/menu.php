<!DOCTYPE html>
<?php
  session_start();
?>
<html>
<head>
  <title>Food Online Delivery</title>
  <link rel="stylesheet" type="text/css" href="styles1.css">

  <script>
    function searchFood() 
    {

      var searchValue = document.getElementById('searchInput').value;
      var xhr = new XMLHttpRequest()

      xhr.onreadystatechange = function() 
      {
        if (xhr.readyState === XMLHttpRequest.DONE) 
        {
          if (xhr.status === 200) 
          {
          
            var response = xhr.responseText;
            document.getElementById('resultsContainer').innerHTML = response;

          }
          else 
          {
            console.error('Error: ' + xhr.status);
          }
        }
      };

      xhr.open('GET', 'classes/searchFood.php?name=' + searchValue, true);
      xhr.send();

    }

  </script>
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
    </ul>
  </nav>
  
 
  <h1>Menu</h1>

  <input type="text" id="searchInput" placeholder="Search by food name">
  <button onclick="searchFood()">Search</button>
  <div id="resultsContainer" class="menu"></div>
   
  </section>

  <footer>
    <p style="font-family:Lucida Console;">&copy; 2023 Food Delivery. All rights reserved.</p>
  </footer>

  <script src="script.js"></script>
</body>
</html>