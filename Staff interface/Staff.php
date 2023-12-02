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
        <link rel="icon" type="image/x-icon" href="/Multi_business_system/picture/sts.png">
        <link rel="stylesheet" href="sstaff.css">
        <script src="staff.js" defer></script>
        <title>Cashier - B-MO</title>
         <!--------------------This is for------------------->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <!--------------------This is for font awesome css------------------->
        <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <link rel="icon" type="image/x-icon" href="/Sad-Activity/picture/logo.png">
       
    </head>
    <body onload="renderTime();">
        <div class="container-1">
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
                                    <td colspan="6"></td>
                                    
                                </tr>
                            </tfoot>
                                    
                      </div>
                    </table>
         <?php include ('footer.php')?>
         </div>
            <div id="clock-display" class="clock-display"></div>
        </div>



        <div class="container-3">
          <img class="logo_business" src="/Multi_business_system/picture/sts.png" alt="">
          <div class="Branchname" ><?php echo $Branhh?></div>
         <div class="tot">
            <div class="total_label">Total</div>
            <input class="total_input"  type="text" id="total-price"  readonly>
            <form id="sales-form">
            <button id="purchase-btn" class="purchase"><i class="fa-solid fa-cart-shopping" style="color: #e6e6e6;"></i> Purchase</button>
    </form>
         </div>
        </div>

    </body>
</html>