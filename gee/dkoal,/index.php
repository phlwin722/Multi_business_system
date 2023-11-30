<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Live Data</title>
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Include custom JavaScript file -->
    <script src="script.js"></script>
</head>
<body>

<!-- Search Form -->
<label for="search">Search Product:</label>
<input type="text" id="search" autocomplete="off">

<!-- Display Search Results -->
<div id="search-results"></div>

<!-- Display Selected Products in Table -->
<table id="selected-products">
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Branch</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="selected-products-body"></tbody>
    <tfoot>
        <tr>
            <td colspan="4"></td>
            <td>Total Price:</td>
            <td><input type="text" id="total-price" readonly></td>
        </tr>
    </tfoot>
</table>

<!-- Purchase Button -->
<button id="purchase-btn">Purchase</button>

</body>
</html>
