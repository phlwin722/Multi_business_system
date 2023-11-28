
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajax Live Data Search</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        #search-results {
            display: none;
            border: 1px solid #ccc;
            position: absolute;
            background-color: #fff;
            z-index: 1;
            width: 250px;
            max-height: 150px;
            overflow-y: auto;
        }

        .delete-btn {
            cursor: pointer;
            color: red;
        }
    </style>
</head>
<body>
    <h2>Ajax Live Data Search</h2>
    <input type="text" id="search" placeholder="Search for a product...">
    <div id="search-results"></div>
    <table id="product-table">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Branch</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
         
        </tbody>
    </table>
    <br>
    <label>Total Price:</label>
    <input type="text" id="total" readonly>
    <br><br>
    <form id="sales-form">
        <input type="submit" value="Save Sales">
    </form>

    <script>
        $(document).ready(function () {
            $("#search").on("input", function () {
                var searchTerm = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "search_product.php",
                    data: { term: searchTerm },
                    success: function (data) {
                        $("#search-results").html(data);
                        $("#search-results").show();
                    }
                });
            });

            $(document).on("click", ".result-item", function () {
                var selectedProduct = $(this).data("product");
                $("#search-results").hide();
                $("#product-table tbody").append(selectedProduct);

                // Clear input after clicking
                $("#search").val("");

                // Update total price
                updateTotalPrice();
            });

            // Delete row when delete button is clicked
            $(document).on("click", ".delete-btn", function () {
                $(this).closest("tr").remove();
                updateTotalPrice();
            });

            // Form submission to save sales
            $("#sales-form").submit(function (e) {
                e.preventDefault();

                var totalSales = $("#total").val();

                // Perform Ajax request to save sales in the "salee" table
                $.ajax({
                    type: "POST",
                    url: "save_sales.php",
                    data: { totalSales: totalSales },
                    success: function (response) {
                        alert(response);
                    }
                });
            });

            // Hide suggestions when clicking outside the search box
            $(document).on("click", function (e) {
                if (!$(e.target).closest("#search-results").length && !$(e.target).is("#search")) {
                    $("#search-results").hide();
                }
            });

            function updateTotalPrice() {
                var totalPrice = 0;
                $("#product-table tbody tr").each(function () {
                    var price = parseFloat($(this).find("td:eq(2)").text());
                    totalPrice += isNaN(price) ? 0 : price;
                });
                $("#total").val(totalPrice.toFixed(2));
            }
        });
    </script>
</body>
</html>



