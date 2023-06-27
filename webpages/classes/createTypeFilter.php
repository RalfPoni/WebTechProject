<?php
    include_once "dbClass.php";
    include_once "searchFood.php";

    $foodSearch = new FoodSearch();
    $foodTypes = $foodSearch->getFoodTypes();
    
    $typeFilter = $_GET['typeFilter'] ?? '';
?>

<select id="typeFilter" onchange="searchFood()">
  <option value="">All</option>
  <?php
    foreach ($foodTypes as $type) 
    {
        $selected = ($typeFilter === $type) ? 'selected' : '';
        echo '<option value="' . $type . '" ' . $selected . '>' . $type . '</option>';
    }
  ?>
</select>
