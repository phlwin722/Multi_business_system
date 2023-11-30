$(document).ready(function() {
    // Event listener for search input
    $("#search").on("input", function() {
        var query = $(this).val();
        // Perform Ajax request to get search results
        $.ajax({
            url: "search.php",
            method: "POST",
            data: { query: query },
            success: function(data) {
                $("#search-results").html(data);
            }
        });
    });

    // Event listener for selecting a product from search results
    $("#search-results").on("click", ".select-product", function() {
        var productId = $(this).data("id");
        // Perform Ajax request to get product details
        $.ajax({
            url: "get_product.php",
            method: "POST",
            data: { productId: productId },
            success: function(data) {
                $("#selected-products-body").append(data);
                updateTotalPrice();
                // Clear search input and results
                $("#search").val("");
                $("#search-results").html("");
            }
        });
    });

    // Event listener for removing a selected product
    $("#selected-products-body").on("click", ".remove-product", function() {
        $(this).closest("tr").remove();
        updateTotalPrice();
    });

    // Event listener for purchase button
    $("#purchase-btn").on("click", function() {
        // Perform Ajax request to save purchase in the database
        $.ajax({
            url: "purchase.php",
            method: "POST",
            data: { selectedProducts: getSelectedProducts() },
            success: function() {
                // Clear selected products table
                $("#selected-products-body").html("");
                updateTotalPrice();
                // Display success modal
                alert("Purchase successful!");
            }
        });
    });

    // Function to update the total price input
    function updateTotalPrice() {
        var totalPrice = 0;
        $("#selected-products-body tr").each(function() {
            var price = parseFloat($(this).find(".price").text());
            var quantity = parseInt($(this).find(".quantity input").val());
            totalPrice += price * quantity;
        });
        $("#total-price").val(totalPrice.toFixed(2));
    }

    // Function to get selected products as an array
    function getSelectedProducts() {
        var selectedProducts = [];
        $("#selected-products-body tr").each(function() {
            var productId = $(this).find(".product-id").text();
            var productName = $(this).find(".product-name").text();
            var quantity = parseInt($(this).find(".quantity input").val());
            selectedProducts.push({ productId: productId, productName: productName, quantity: quantity });
        });
        return selectedProducts;
    }
});
