<?php
// Include database connection
include_once 'db_connection.php';

if (isset($_GET['term'])) {
    $searchTerm = $_GET['term'];
    $query = "SELECT * FROM product WHERE Product_name LIKE ? OR Product_code LIKE ?";
    
    $stmt = $mysqli->prepare($query);
    $param = "%{$searchTerm}%";
    $stmt->bind_param("ss", $param, $param);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo '<div class="result-item" data-product="<tr><td>' . $row['Quantity'] . '</td><td>' . $row['Product_code'] . '</td><td>' . $row['Product_name'] . '</td><td>' . $row['Price'] . '</td></tr>" data-click-count="0">' . $row['Product_name'] . '</div>';
    }
}
?>
