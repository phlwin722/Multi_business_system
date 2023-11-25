<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="Product.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <title>Product</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="product.js" defer></script>
        <title>Product - B-MO</title>
        <link rel="icon" type="image/x-icon" href="/Sad-Activity/picture/logo.png">
       
    </head>
    <body>
        <div class="left">
        <img src="/Multi_business_system/picture/logo.png" style="width: 30px;position:absolute; top:10px; left:20px;" alt="">
                 <div class="Company">B-MO</div>
                <div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-circle-user"></i></button>
                  <div id="myDropdown" class="dropdown-content">
                  <a href="Myacctowner.php" target="_top">My account</a>
                 </div>
              </div>
        </div>

        <div class="sidenav" id="a">
            <div class="companyname">Shirly Bansil</div>
                <div class="owner">Owner</div >
                   <a href="Dashboardowner.php" target="_top" class="nav"><i class="fa-solid fa-house"></i> Dash Board</a>
                   <a href="Salesowner.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Sales</a>
                   <a href="Businessowner.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Business</a>
                   <a href="product.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Products</a>
                   <a href="employee.php" target="_top" class="nav"><i class="fa-solid fa-users"></i> Employee</a>
                  <a href="/Multi_business_system/landingpage/landingpage.php" target="_top"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
        </div>
        
          <div class="main" id="a">

            <div class="frame" src="" name="iframe">
                <div class="addbusines">
                    <div class="product-top">Products</div>
                    </div>
                 
                    <div class="busin-right">
                        <div class="busin-left">
                            <select class="business-selection" name=""businessname id="category-business">
                                <option value="allproducts">All</option>
                                       <?php
                                           $server = 'localhost';
                                            $usner = 'root';
                                            $pass= '';
                                            $dbname = 'multi_bussines_system';
                                            $con = mysqli_connect($server, $usner, $pass,$dbname);
                                            $category = mysqli_query($con,'SELECT * FROM business');
                                             while ($c = mysqli_fetch_array($category)) {
                                                ?>
                                           <option value="<?php echo $c ['Business_name']?>"><?php echo $c['Business_name']?></option>
                                            $con->close();
                                                    <?php }?>
                                                </select>

                            <div class="search-container">
                                <input type="text" class="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                            </div>

                         </div>

                            <!-- Button trigger modal -->   
                            <!--Insert------------------------>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="moove" data-bs-target="#exampleModal">
                Add Product
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="ProductDataBase.php" method="post">
                            <div class="modal-body">
                             <label for="product_code" class="small">Product Code</label>
                             <input type="text" name="productcode" id="product_code" class="nameofproduct" required placeholder="Product Code">
                                 <br>
                             <label for="" class="small">Product name  </liabel>
                             <input type="text" name="nameproduct" id="product_name" class="nameofproduct" required placeholder="Name of Product">
                                                <br>
                           <label for="" class="small">Price: </label>
                           <input type="text" name="priceproduct" id="price" class="nameofproduct" required placeholder="Price of Product">
                             <label for="" class="small">Choose Branch: </label>

                           <!--Chose business name-->
                             <select class="nameofproduct" name="businessname" id="category-business">]
                              <option hidden>Select Branch</option>
                                <?php
                                       $usner = 'root';
                                       $pass= '';
                                       $dbname = 'multi_bussines_system';

                                                    $con = mysqli_connect($server, $usner, $pass,$dbname);
                                                    $category = mysqli_query($con,'SELECT * FROM business');
                                                    while ($c = mysqli_fetch_array($category)) {
                                                ?>
                                                    <option value="<?php echo $c ['Business_name']?>"><?php echo $c['Business_name']?></option>
                                                    $con->close();
                                                    <?php }?>
                                                </select>
                                                       <!--Chose business name-->

                
                                                    <label for="" class="">Quantity: </label>
                                                    <input class="nameofproduct" name="quantity" required type="number">
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
                  <!--Insert------------------------>
                 
                    <!--Edit------------------------>
                    <div class="modal fade" id="editdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="ProductDatabase.php" method="post">
                            <div class="modal-body">
                            <label for="product_code" class="small">Product Code</label>
                                                <input type="text"  name="productcode" id="productcode" class="nameofproduct" required placeholder="Product Code">
                                                <br>
                                                <label for="" class="small">Product name</label>
                                                <input type="text" name="nameproduct" id="productname" class="nameofproduct" required placeholder="Name of Product">
                                                <br>
                                                <label for="" class="small">Price: </label>
                                                <input type="text" id="pricee" name="priceproduct" class="nameofproduct" required placeholder="Price of Product">
                                                 
                                                <label for="" class="small" >Choose Branch: </label>
                                                  <!--Chose business name-->
                                                  <select class="nameofproduct" id="branchh" name="businessname" >]
                                                <option hidden>Select Branch</option>
                                                <?php
                                                    $server = 'localhost';
                                                    $usner = 'root';
                                                    $pass= '';
                                                    $dbname = 'multi_bussines_system';

                                                    $con = mysqli_connect($server, $usner, $pass,$dbname);
                                                    $category = mysqli_query($con,'SELECT * FROM business');
                                                    while ($c = mysqli_fetch_array($category)) {
                                                ?>
                                          <option value="<?php echo $c ['Business_name']?>"><?php echo $c['Business_name']?></option>
                                         $con->close();
                                 <?php }?>
                         </select>
                                   <!--Chose business name-->

                          <label for="" class=""  id="quantity">Quantity: </label>
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
                    <form action="ProductDataBase.php" method="post">
                            <div class="modal-body">
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
                                <div class="List_of_product">
                        <p>List of Product</p>
                        <div class="product">
                        <?php include('header.php'); ?> 

     <table class="table table-bordered table-hover">          
          <thead>
              <tr>
              <th scope="col">Product code</th>
              <th scope="col">Product name</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Branch</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
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
                 $query = " SELECT * FROM product";
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
                              <a href="#" class="btn btn-success btn-sm edit-data">Edit Data</a>
                          </td>
                          <td>
                              <a href="#" class="btn btn-danger btn-sm delete-data">Delete Data</a>
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
                        </div>
                    </div>
                    </div>
            </div>
          </div>
    </body>
</html>