<?php
$dsn = 'mysql:host=localhost;dbname=multi_bussines_system;charset=utf8';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

$query = $_POST['query'];
$sql = "SELECT product_id, product_name FROM products WHERE product_id LIKE :query OR product_name LIKE :query";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':query', "%$query%", PDO::PARAM_STR);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($results) {
    foreach ($results as $row) {
        echo '<div class="search-result select-product" data-id="' . $row['product_id'] . '">' . $row['product_name'] . '</div>';
    }
} else {
    echo '<div class="search-result">No results found</div>';
}
?>
