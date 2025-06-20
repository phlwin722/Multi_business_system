<?php
session_start();

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
$branch = $_SESSION["branche"];

$sql = "SELECT Product_code, Product_name FROM product WHERE (Product_code LIKE :query OR Product_name LIKE :query) AND Branch = :branch";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':query', "%$query%", PDO::PARAM_STR);
$stmt->bindValue(':branch', $branch, PDO::PARAM_STR);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($results) {
    foreach ($results as $row) {
        echo '<div class="search-result select-product" data-id="' . $row['Product_code'] . '" data-branch="' . $branch . '">' . $row['Product_name'] . '</div>';
    }
} else {
    echo '<div class="search-result">No results found</div>';
}
?>

