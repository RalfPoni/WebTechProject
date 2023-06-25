<?php
    include_once "../classes/dbClass.php";

    class FoodSearch extends PDODB {
        public function searchFood($name) {
            $db = $this->connect();
    
            if ($name === '') {
                $sql = "SELECT * FROM food";
                $stmt = $db->query($sql);
            } else {
                $sql = "SELECT * FROM food WHERE name LIKE '%" . $name . "%'";
                $stmt = $db->prepare($sql);
                $stmt->execute();
            }
    
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }
    
    $searchValue = isset($_GET['name']) ? $_GET['name'] : '';
    
    $foodSearch = new FoodSearch();
    $results = $foodSearch->searchFood($searchValue);
    
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
        echo '<h3 style="font-family: Lucida Console; color:green">' . $row['type'] . '</h4>';
        echo '<h3 style="font-family: Lucida Console; color:green">' . $row['description'] . '</h4>';
        echo '<p style="font-family: Lucida Console; color:green">Price: $' . $row['price'] . '</p>';
        echo '</div>';
    }
?>