<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AJAX Live Data</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<input type="text" id="searchInput" placeholder="Search by Product Code or Name">
<div id="searchResults"></div>

<table id="productTable" border="1">
    <thead>
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Branch</th>
    </tr>
    </thead>
    <tbody></tbody>
</table>

<input type="text" id="total" readonly>
<button id="submitSale">Submit Sale</button>

<script>
    $(document).ready(function () {
        $("#searchInput").on("input", function () {
            var query = $(this).val();

            if (query.length > 0) {
                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: {query: query},
                    success: function (data) {
                        $("#searchResults").html(data);
                    }
                });
            } else {
                $("#searchResults").html("");
            }
        });

        $(document).on("click", ".searchResult", function () {
            var productId = $(this).data("product-id");
            $.ajax({
                url: "getProduct.php",
                method: "POST",
                data: {productId: productId},
                success: function (data) {
                    var product = JSON.parse(data);
                    addProductToTable(product);
                    $("#searchInput").val("");
                    $("#searchResults").html("");
                }
            });
        });

        function addProductToTable(product) {
            var row = "<tr>" +
                "<td>" + product.product_id + "</td>" +
                "<td>" + product.product_name + "</td>" +
                "<td>" + product.price + "</td>" +
                "<td>" + product.quantity + "</td>" +
                "<td>" + product.branch + "</td>" +
                "</tr>";
            $("#productTable tbody").append(row);

            updateTotal();
        }

        function updateTotal() {
            var total = 0;
            $("#productTable tbody tr").each(function () {
                total += parseFloat($(this).find("td:eq(2)").text());
            });
            $("#total").val(total.toFixed(2));
        }

        $("#submitSale").on("click", function () {
            var total = $("#total").val();
            var branch = "Branch Name"; // Replace with the actual branch name
            var date = new Date().toISOString().split('T')[0]; // Current date in YYYY-MM-DD format

            $.ajax({
                url: "submitSale.php",
                method: "POST",
                data: {total: total, branch: branch, date: date},
                success: function (response) {
                    alert(response); // You can handle the response as needed
                    // Clear the table and total
                    $("#productTable tbody").html("");
                    $("#total").val("");
                }
            });
        });
    });
</script>

</body>
</html>

<?php
// Include your database connection code here
