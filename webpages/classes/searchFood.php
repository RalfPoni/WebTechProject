<?php
include_once "dbClass.php";

class FoodSearch extends PDODB {
    public function searchFood($name, $typeFilter, $priceOrder) 
    {
        $db = $this->connect();
        $sql = "SELECT * FROM food";
        
        if ($name !== '') 
        {
            $sql .= " WHERE name LIKE :name";
        }
        
        if ($typeFilter !== '') 
        {
            if ($name !== '') 
            {
                $sql .= " AND type = :typeFilter";
            } 
            else 
            {
                $sql .= " WHERE type = :typeFilter";
            }
        }
        
        if ($priceOrder !== '') 
        {
            $sql .= " ORDER BY price " . $priceOrder;
        }
        
        $stmt = $db->prepare($sql);
        
        if ($name !== '') 
        {
            $stmt->bindValue(':name', '%' . $name . '%');
        }
        
        if ($typeFilter !== '') 
        {
            $stmt->bindValue(':typeFilter', $typeFilter);
        }
        
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            

        return $results;
    }

    public function getFoodTypes() 
    {
        $db = $this->connect();

        $sql = "SELECT DISTINCT type FROM food";
        $stmt = $db->query($sql);
        $types = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $types;
    }
}

$foodSearch = new FoodSearch();

if (isset($_GET['name']) || isset($_GET['typeFilter']) || isset($_GET['price'])) {
    $results = $foodSearch->searchFood($_GET['name'] ?? '', $_GET['typeFilter'] ?? '', $_GET['price'] ?? '');

    foreach ($results as $row) 
    {
        echo '<div class="menu-item">';
        echo '<h3 style="font-family: Lucida Console; color:green">' . $row['name'] . '</h3>';

        if ($row['image']) 
        {
            $imageData = $row['image'];
            $base64Image = base64_encode($imageData);
            $imageSrc = 'data:image/jpeg;base64,' . $base64Image;

            echo '<img src="' . $imageSrc . '" alt="Food Image" width="200" height="200">';
        }
        echo '<h3 style="font-family: Lucida Console; color:green">' . $row['type'] . '</h3>';
        echo '<h4 style="font-family: Lucida Console; color:green">' . $row['description'] . '</h4>';
        echo '<p style="font-family: Lucida Console; color:green">Price: $' . $row['price'] . '</p>';
        echo '</div>';
    }
}
?>

<script src="scripts/searchScript.js"></script>
