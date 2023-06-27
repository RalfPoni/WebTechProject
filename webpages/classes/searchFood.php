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

    public function getFoodById($id) 
    {
        $db = $this->connect();

        $sql = "SELECT * FROM food WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }



    public function displayCart()
    {
        echo '<h3 style="font-family: Lucida Console; color:green">Items in your cart:</h3>';
        echo '<ul>';

        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) 
        {
            foreach ($_SESSION['cart'] as $itemId) 
            {
                $foodItem = $this->getFoodById($itemId);

                if ($foodItem) {
                    echo '<li>';
                    echo '<h4 style="font-family: Lucida Console; color:green">' . $foodItem['name'] . '</h4>';
                    echo '<p style="font-family: Lucida Console; color:green">Type: ' . $foodItem['type'] . '</p>';
                    echo '<p style="font-family: Lucida Console; color:green">Description: ' . $foodItem['description'] . '</p>';
                    echo '<p style="font-family: Lucida Console; color:green">Price: $' . $foodItem['price'] . '</p>';
                    echo '</li>';
                }
            }
        } 
        else 
        {
            echo '<li style="font-family: Lucida Console; color:green">Your cart is empty.</li>';
        }

        echo '</ul>';
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
        echo '<button onclick="addToCart('. $row['id'] . ')">Add to Cart</button>';
        echo '</div>';
    }
}
?>

<script src="../scripts/searchScript.js"></script>
<script src="scripts/cartScript.js"></script>
