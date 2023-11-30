<?php
// Establish a database connection using PDO
$dsn = 'mysql:host=localhost;dbname=multi_bussines_system';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
// Assume you have a connection to the database established

// Get the selected product ID from the POST request
$productId = $_POST['productId'];

// Retrieve product details based on the selected product ID
$sql = "SELECT * FROM products WHERE product_id = :productId";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':productId', $productId, PDO::PARAM_INT);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// Display product details in HTML format
echo '<tr>
        <td class="product-id">' . $product['product_id'] . '</td>
        <td class="product-name">' . $product['product_name'] . '</td>
        <td class="price">' . $product['price'] . '</td>
        <td class="quantity"><input type="number" value="1" min="1"></td>
        <td class="branch">' . $product['branch'] . '</td>
        <td><button class="remove-product">Remove</button></td>
    </tr>';
?>
