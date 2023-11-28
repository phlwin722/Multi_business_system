<?php
// Include database connection
include_once 'db_connection.php';

if (isset($_GET['term'])) {
    $searchTerm = $_GET['term'];
    $query = "SELECT * FROM products WHERE product_name LIKE ? OR product_id LIKE ?";
    
    $stmt = $mysqli->prepare($query);
    $param = "%{$searchTerm}%";
    $stmt->bind_param("ss", $param, $param);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo '<div class="result-item" data-product="<tr><td>' . $row['product_id'] . '</td><td>' . $row['product_name'] . '</td><td>' . $row['price'] . '</td><td>' . $row['quantity'] . '</td><td>' . $row['branch'] . '</td></tr>" data-click-count="0">' . $row['product_name'] . '</div>';
    }
}
?>
