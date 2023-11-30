<?php
session_start();
?>
<?php 
      $id = $_SESSION ["id"];
      $Branhh = $_SESSION["branche"];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="/Sad-Activity/picture/logo.png">
        <link rel="stylesheet" href="staff.css">
        <script src="staff.js" defer></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <link rel="icon" type="image/x-icon" href="/Sad-Activity/picture/logo.png">
       
    </head>
    <body onload="renderTime();">
        <div class="container-1">
        <img src="/Multi_business_system/picture/logo.png" class="move" style="width: 40px;margin-top: 10px;margin-left: 20px;" alt="">
            <label class="name_web">BUIMO</label>

            <?php
               $localhost ="localhost";
               $user = "root";
               $pass="";    
               $dbname = "multi_bussines_system";
                
                $con = mysqli_connect($localhost,$user,$pass,$dbname) or die("Error");
               $query = mysqli_query ($con,"SELECT * FROM employee WHERE ID= $id") or die("");
               while ($result = mysqli_fetch_assoc($query)) {
                    $res_firtname = $result ["First_name"];
                    $res_lastname = $result ["Last_name"];
                    $res_Branch = $result ["Branch"];
               }

            ?>
            <label class="name_staff"><?php echo $res_firtname ." ". $res_lastname  ?></label>
            <a href="/Multi_business_system/landingpage/logout.php" class="logut"> Logout</a>
        </div>


        <div class="container-2">
            <form action="" method="post">
         <label for="">Enter Product Code </label>
         <input type="text" id="search" placeholder="Search product code or name" autocomplete="off">
         <div id="search-results"></div>
         </form>
         <div class="salestable">
         <?php include ('header.php')?>
         
         <table class="table table-bordered table-hover" id="selected-products">          
                        <thead>
                            <tr>
                            <th scope="col">Quantity</th>
                            <th scope="col">Product Code</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                            </tr>
                    
                        </thead>
                            <tbody id="selected-products-body"></tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4"></td>
                                    
                                </tr>
                            </tfoot>
                                    
                      </div>
                    </table>
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

            // Hide suggestions when clicking outside the search box
            $(document).on("click", function (e) {
                if (!$(e.target).closest("#search-results").length && !$(e.target).is("#search")) {
                    $("#search-results").hide();
                }
            });

             // Delete row when delete button is clicked
             $(document).on("click", ".delete-btn", function () {
                $(this).closest("tr").remove();
                updateTotalPrice();
            });

          // Form submission to save sales
$("#sales-form").submit(function (e) {
    e.preventDefault();

    var totalSales = $("#total-price").val();

    // Perform Ajax request to save sales in the "salee" table
    $.ajax({
        type: "POST",
        url: "save_sale.php",
        data: { totalSales: totalSales },
        success: function (response) {
            console.log(response);
        }
    });
});


            

            function updateTotalPrice() {
                var totalPrice = 0;
                $("#product-table tbody tr").each(function () {
                    var price = parseFloat($(this).find("td:eq(3)").text());
                    totalPrice += isNaN(price) ? 0 : price;
                });
                $("#total-price").val(totalPrice.toFixed(2));
            }
        });
    </script>

         <?php include ('footer.php')?>
         </div>
            <div id="clock-display" class="clock-display"></div>
        </div>



        <div class="container-3">
          <img class="logo_business" src="/Multi_business_system/picture/logo.png" alt="">
         <div class="tot">
            <label class="total_label" for="">Total</label>
            <input class="total_input"  type="text" id="total-price"  readonly>
            <form id="sales-form">
            <button id="purchase-btn">Purchase</button>
    </form>
         </div>
        </div>

    </body>
</html>