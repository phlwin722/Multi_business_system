<?php
// Include your database connection code here

if (isset($_POST['total']) && isset($_POST['branch']) && isset($_POST['date'])) {
    $total = $_POST['total'];
    $branch = $_POST['branch'];
    $date = $_POST['date'];

    // Insert sales data into the 'salee' table
    $sql = "INSERT INTO salee (branch, sales, date) VALUES ('$branch', '$total', '$date')";
    // Execute the query and provide appropriate feedback
}
?>
