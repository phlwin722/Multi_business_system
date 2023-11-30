<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Live Data</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
</head>
<body>

<label for="search">Search Product:</label>
<input type="text" id="search" autocomplete="off">

<div id="search-results"></div>

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
        
        </tr>
    </tfoot>
</table>
<label>Total Price:</label>
            <input type="text" id="total-price" readonly>
<button id="purchase-btn">Purchase</button>

</body>
</html>



<!--<!DOCTYPE html>
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

       .remove-btn {
           color: red;
           cursor: pointer;
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
   <button id="submit-btn">Submit</button>

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

           // Remove row when remove button is clicked
           $(document).on("click", ".remove-btn", function () {
               $(this).closest("tr").remove();
               updateTotalPrice();
           });

           // Submit button click event
           $("#submit-btn").click(function () {
               saveSales();
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
                   var quantity = parseInt($(this).find(".quantity-input").val()) || 0;
                   totalPrice += isNaN(price) ? 0 : price * quantity;
               });
               $("#total").val(totalPrice.toFixed(2));
           }

           function saveSales() {
               var totalSales = $("#total").val();
               var salesData = [];

               $("#product-table tbody tr").each(function () {
                   var productId = $(this).find("td:eq(0)").text();
                   var productName = $(this).find("td:eq(1)").text();
                   var quantitySold = parseInt($(this).find(".quantity-input").val()) || 0;
                   var branch = $(this).find("td:eq(4)").text();

                   // Update quantity in products table
                   $.ajax({
                       type: "POST",
                       url: "update_quantity.php",
                       data: { productId: productId, quantitySold: quantitySold },
                       success: function (response) {
                           console.log(response);
                       }
                   });

                   // Add sales data to array
                   salesData.push({
                       productId: productId,
                       productName: productName,
                       quantitySold: quantitySold,
                       branch: branch
                   });
               });

               // Insert sales data into salee table
               $.ajax({
                   type: "POST",
                   url: "save_sales.php",
                   data: { totalSales: totalSales, salesData: JSON.stringify(salesData) },
                   success: function (response) {
                       alert(response);
                       // Optionally, you can update the top_product table here
                   }
               });
           }
       });
   </script>
</body>
</html> -->
