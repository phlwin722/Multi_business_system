<?php 
    session_start();
?>

<?php 
   $middlename = $_SESSION['middlename'];
   $lastname = $_SESSION['lastname'];
   $branch = $_SESSION ['branch'];
   $fname = $_SESSION ["fname"];
   $position = $_SESSION['position'];
?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="productManage.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <title>Product</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        <script src="product.js" defer></script>
        <title>Product - B-MO</title>
        <link rel="icon" type="image/x-icon" href="/Multi_business_system/picture/sts.png">
  
    </head>
    <body>
   
        <div class="left">
        <img src="/Multi_business_system/picture/sts.png" style="height:60px; width: 80px;position:absolute; top:-4px; left:50px;" alt="">
            
        </div>

        <div class="sidenav" id="a">
        <div class="companyname"> <?php echo $branch?> </div>
            <div class="owner">
              <h6>  <?php echo $fname ." ". $middlename ." ". $lastname ?> </h6>
              <h6><?php echo $position;?></h6>
            </div >
                <a href="DashboardManager.php" target="_top" class="nav"><i class="fa-solid fa-house"></i> Dash Board</a>
                   <a href="SalesManager.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Sales</a>
                   <a href="ProductManager.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Products</a>
                   <a href="StaffAcctManager.php" target="_top" class="nav"><i class="fa-solid fa-users"></i> Staff</a>
                   <a href="/Multi_business_system/landingpage/logout.php" target="_top" ><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
    </div>
          <div class="main" id="a">

            <div class="frame" src="" name="iframe">
                <div class="addbusines">
                    <div class="product-top">Product</div>
                    
                    </div>
                 
                    <div class="busin-right">

                        <h6 class="prud">List of Product</h6>
                          
                        <div class="busin-left">
    

                            <div class="search-container">
                                <input type="text" id="myinput" class="myInput" onkeyup="searchFunction()" placeholder="Search for names.." title="Type in a name">
                            </div>

                         </div>

                            <!-- Button trigger modal -->   
                         
                    <!--Insert------------------------>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="moove" data-bs-target="#exampleModal">
                Add Product
                </button>
                             <!----- php Modal and database connection ------->
                             <?php include('header.php'); ?> 
                             <?php 
            // Validate form data
            $errors = [];
            // insert data
            if (isset($_POST["upload"])) {     
                 
                    $nameproduct = htmlspecialchars($_POST["nameproduct"]);
                    $priceproduct = htmlspecialchars($_POST["priceproduct"]);
                $businessname = htmlspecialchars($_POST["businessname"]);
                $quantity = htmlspecialchars($_POST["quantity"]);
                    $host = "localhost";
                    $dbname = "multi_bussines_system";
                    $username = "root";
                    $password = "";
            
                    try {
                        // Create a PDO instance
                        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                        
                        // Set the PDO error mode to exception
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                        // Prepare and execute the SQL query to insert data
                        $stmt = $pdo->prepare("INSERT INTO product (Product_name, Price, Quantity, Branch) VALUES ( ?, ?, ? ,?)");
                        $stmt->execute([ $nameproduct, $priceproduct, $quantity, $businessname]);
                        echo '<div style="postion:absolute; top:8px; padding:5px; height:40px" class="alert alert-success" role="alert">
                        Successfull Inserted
                        <button style="position:absolute; right:10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    } catch (PDOException $e) {
                        echo "Error inserting data: " . $e->getMessage();
                    }
                    // Close the database connection
                    $pdo = null;
                }
            //insert data

            //edit data
            if (isset($_POST["savechanges"])) {
            $product = htmlspecialchars($_POST['productcode']);
            $productname = htmlspecialchars    ($_POST['nameproduct']);
            $price= htmlspecialchars ($_POST['priceproduct']);
            $quantity = htmlspecialchars  ($_POST['quantity']);
            $branch = htmlspecialchars($_POST['businessname']);
            
                // Database connection settings
                $host = "localhost";
                $dbname = "multi_bussines_system";
                $username = "root";
                $password = "";

                try {
                    // Create a PDO instance
                    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    
                    // Set the PDO error mode to exception
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $pdo->prepare("UPDATE product SET Product_name= ?, Price= ? , Quantity = ? ,Branch = ?  WHERE Product_code=?");
                    $stmt->execute ([$productname, $price, $quantity ,$branch, $product]);

                    echo '<div style="postion:absolute; top:8px; padding:5px; height:40px" class="alert alert-success" role="alert">
                    Successfull Edit
                    <button style="position:absolute; right:10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                } catch (PDOException $e) {
                    echo "Error inserting data: " . $e->getMessage();
                }

                // Close the database connection
                $pdo = null;
            }
            // edit data

            if (isset($_POST["delete_employee"])){
            $local ="localhost";
            $username = "root";
            $pass ="";
                $dbnamee = "multi_bussines_system";
            $ID = htmlspecialchars($_POST["ID"]);

            try{
                $pdo = new PDO("mysql:host=$local;dbname=$dbnamee", $username, $pass);
                $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "DELETE FROM product WHERE Product_code = :ID";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':ID', $ID);
                    $stmt->execute();
                    echo '<div style="postion:absolute; top:8px; padding:5px; height:40px" class="alert alert-danger" role="alert">
                    Successfull Delete  
                    <button style="position:absolute; right:10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }catch (PDOException $e) {
                echo " ". $e->getMessage();
            }
            $pdo = null;
            } //////delete data  product
            ?>
                           <!----- php  Modal and database connection ------->
                          <!------------------------------------------------------>
                             <!--Insert------------------------>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                            <div class="modal-body">
                            
                             <label for="" class="small">Product name  </liabel>
                             <input type="text" name="nameproduct" id="product_name" class="nameofproduct" required placeholder="Name of Product">
                                                <br>
                           <label for="" class="small">Price: </label>
                           <input type="text" name="priceproduct" id="price" value="0.00" class="nameofproduct" required placeholder="Price of Product">
                             <label for="" class="small">Branch: </label>

                           <!--Chose business name-->
                    
                                <?php
                                      $server ="localhost";
                                       $usner = 'root';
                                       $pass= '';
                                       $dbname = 'multi_bussines_system';

                                                    $con = mysqli_connect($server, $usner, $pass,$dbname);
                                                    $category = mysqli_query($con,"SELECT * FROM business WHERE Business_name='$branch'");
                                                    while ($c = mysqli_fetch_array($category)) {
                                                ?>
                                                        <input type="text" class="nameofproduct" readonly  name="businessname" id="category-business" value="<?php echo $c ['Business_name']?>">
                                  
                                                    <?php } $con->close();?>
                                               
                                                       <!--Chose business name-->

                
                                                    <label for="" class="">Quantity: </label>
                                                    <input class="nameofproduct" name="quantity" value="1" required type="number">
                                                <br>
                                                  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" name="upload" value="Save">                          
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                  <!--Insert ,------------------------>
                 
                    <!--Edit------------------------>
                    <div class="modal fade" id="editdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                            <div class="modal-body">
                                                <input type="text" hidden name="productcode" id="productcode" class="nameofproduct" required placeholder="Product Code">
                                              
                                                <label for="" class="">Product name</label>
                                                <input type="text" name="nameproduct" id="productname" class="nameofproduct" required placeholder="Name of Product">
                                                <br>
                                                <label for="" class=""  id="quantity">Price</label>
                          
                                                <input type="text" id="pricee" name="priceproduct" class="nameofproduct" required placeholder="Price of Product">
                                                <label for="" class=""  id="quantity">Branch</label>
                                                  <!--Chose business name-->
                                                <?php
                                                    $server = 'localhost';
                                                    $usner = 'root';
                                                    $pass= '';
                                                    $dbname = 'multi_bussines_system';
                                                    
                                                    $con = mysqli_connect($server, $usner, $pass,$dbname);
                                                    $category = mysqli_query($con,"SELECT * FROM business WHERE Business_name = '$branch'");
                                                    while ($c = mysqli_fetch_array($category)) {
                                                ?>
                                          <input class="nameofproduct" id="branchh" name="businessname" required type="text" readonly value="<?php echo $c ['Business_name']?>">
                        
                                 <?php } $con->close();?>
                         </select>
                                   <!--Chose business name-->

                          <label for="" class=""  id="quantity">Quantity</label>
                        <input class="nameofproduct" name="quantity" id="quantityy" required type="number">
                                           
                                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" name="savechanges" value="Save changes">                          
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                  <!--Edit------------------------>
                 
                 <!-- delete Modal -->
                 <div class="modal fade" id="deletedata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Business</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                            <div class="modal-body hell">
                                <h5>Are you sure Do you want delete</h5>
                                <input hidden id="product_codee" name="ID"></input>
                                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary btn-danger" type="submit" name="delete_employee" value="Delete">                          
                    </div>
                    </form>
                    </div>
                </div>
                </div>


                            <!----- delete Modal ------->

                          <!-------------------------------------------------------->
                                            <div class="List_of_product">
                    
                        <div class="product" id="scrollableDiv" id="tableee">
                   

     <table class="table table-bordered table-hover" id="productTable">          
          <thead>
              <tr>
              <th scope="col">Product code</th>
              <th scope="col">Product name</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Branch</th>
              <th scope="col">Action</th>
              </tr>
          </thead>
          <tbody>
              <?php 
               $host = "localhost";
               $dbname = "multi_bussines_system";
               $username = "root";
               $password = "";
            

              try{
                  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                   $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  // prepare and execute a query
                  $query = " SELECT * FROM product WHERE Branch = '$branch'";
                  $statement = $pdo->prepare($query);
                 $statement->execute();

                 // to desplay fetch all of data
                 $result = $statement->fetchALL(PDO::FETCH_ASSOC);

                 if( $result){
                  foreach ($result as $row){
                      ?>
                      <tr>
                          <td class="user_id"><?= $row['Product_code'];?></td>
                          <td><?= $row['Product_name']?></td>
                          <td><?= $row['Price']?></td>
                          <td><?= $row['Quantity']?></td>
                          <td><?= $row['Branch']?></td>
                          <td>
                              <a href="#" class="btn btn-success btn-sm edit-data"> <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i> </a>
                              <a href="#" class="btn btn-danger btn-sm delete-data"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></a>
                        
                          </td>
                        
                      </tr>
                      <?php
                  }
                 }

              }catch(PDOException $e){
                  echo $e->getMessage();
              }
              $pdo=null;
              ?>
            
          </tbody>

        </div>
      </table>

      <!--bootstarp js-->
      <?php include('footer.php');?>

      <script> 
                    //.....edit update data display modal/////
                    $(document).ready(function() {
                        $('.edit-data').on ('click',function(){
                            $('#editdata').modal('show');

                            $tr = $(this).closest('tr');
                            var data = $tr.children("td").map(function(){
                               return $(this).text();
                            }).get();
                                $('#productcode').val(data[0]);
                                $('#productname').val(data[1]);
                                $('#pricee').val(data[2]);
                                $('#quantityy').val(data[3]);
                                $('#branchh').val(data[4]);
                        });
                    });
                    // edit update data /edit data display modal
                </script> 

       <script> 
            
                                $(document).ready(function () {
                                    // Get references to your scrollable div and the div to be synchronized
                                    var scrollableDiv = $("#scrollableDiv");
                                    var topSaleDiv = $("#tableee");

                                    // Bind the scroll event on the scrollable div
                                    scrollableDiv.on("scroll", function () {
                                        // Set the scrollTop of the topSale div to match the scroll position of the scrollable div
                                        topSaleDiv.scrollTop(scrollableDiv.scrollTop());
                                    });
                                });


                    //delete data display modal
                    $(document).ready(function() {
                        $('.delete-data').on ('click',function(){
                            $('#deletedata').modal('show');

                            $tr = $(this).closest('tr');
                            var data = $tr.children("td").map(function(){
                               return $(this).text();
                            }).get();
                                $('#product_codee').val(data[0]);
                        });
                    });
                    // delete data /edit data display modal

                    </script> 
                <script>
                    
        // filter option on select option branch
        // Add an event listener to the business-selection dropdown
        $('.business-selection').change(function () {
    var selectedBranch = $(this).val();

    // Send an AJAX request to fetch products based on the selected branch
    $.ajax({
        url: 'fetch_products.php', // Replace with the actual filename
        method: 'POST',
        data: { selectedBranch: selectedBranch },
        success: function (response) {
            // Update the productTable with the fetched data
            $('#productTable tbody').html(response);
        }
    });
});
            // search in table from input searcj
            function searchFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myinput");
                filter = input.value.toUpperCase();
                table = document.getElementById("productTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }

            
    </script>
                        </div>
                    </div>
                    </div>
            </div>
          </div>
    </body>
</html>