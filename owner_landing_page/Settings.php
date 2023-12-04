<?php
 session_start();
 ?>

<?php 
  $fname = $_SESSION ["ffname"];
  $lname = $_SESSION ["lname"];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="Sttings.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        <script src="product.js" defer></script>
        <title>Setting - B-MO</title>
        <link rel="icon" type="image/x-icon" href="/Multi_business_system/picture/sts.png">
  
    </head>
    <body>
         <div class="left">
        <img src="/Multi_business_system/picture/sts.png" style="height:60px; width: 80px;position:absolute; top:-4px; left:50px;" alt="">
             <div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-circle-user"></i></button>
                  <div id="myDropdown" class="dropdown-content">
                  <a href="Myacctowner.php" target="_top">My account</a>
                 </div>
              </div>
        </div>

        <div class="sidenav" id="a">
            <div class="companyname"><?php echo $fname ." ". $lname?></div>
                <div class="owner">Owner</div >
                   <a href="Dashboardowner.php" target="_top" class="nav"><i class="fa-solid fa-house"></i> Dash Board</a>
                   <a href="ownersale.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Sales</a>
                   <a href="Businessowner.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Business</a>
                   <a href="product.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Products</a>
                   <a href="employee.php" target="_top" class="nav"><i class="fa-solid fa-users"></i> Employee</a>
                   <a href="Settings.php" target="_top" class="nav"><i class="fa-solid fa-gear" style="color: #fcfcfc;"></i> Setting</a>
                   <a href="/Multi_business_system/landingpage/logout.php" target="_top"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
        </div>
        
          <div class="main" id="a">

            <div class="frame" src="" name="iframe">
                <div class="addbusines">
                    <div class="product-top" id="scrollableDiv" id="tableee">Settings</div>
                    </div>
                 
                    <div class="busin-right">
                        <div class="busin-left">
                       <!--------------------------data base--------------------------------------------------------->
                                    
                       <?php
                        ///////////////////// delete staff //////////////////////////////////
                                        if (isset($_POST["delete_staff"])) {     
                                                $Staff = 'Staff';

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
                                                    $stmt = $pdo->prepare("DELETE FROM employee WHERE Position= :Staff");
                                                    $stmt->bindParam(':Staff',$Staff);
                                                    $stmt->execute();
                                                    echo '<div style="postion:absolute; top:-5px; padding:10px; height:50px" class="alert alert-success" role="alert">
                                                Successfull delete
                                                <button style="position:absolute; right:10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>';
                                                } catch (PDOException $e) {
                                                    echo "Error inserting data: " . $e->getMessage();
                                                }
                                                // Close the database connection
                                                $pdo = null;
                                            }
                                       ///////////////// //delelte staff ///////////////////////////////

                                        /////////////////////// delte Manager /////////////////
                                        if (isset($_POST["delete_manager"])) {
                                        $manager = 'Manager';
                                        
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
                                               $stmt = $pdo->prepare("DELETE FROM employee WHERE Position = :manager");
                                               $stmt -> bindParam("manager", $manager);
                                               $stmt -> execute();
                                                echo '<div style="postion:absolute; top:-5px; padding:10px; height:50px" class="alert alert-success" role="alert">
                                                Successfull Delete
                                                <button style="position:absolute; right:10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>';
                                            } catch (PDOException $e) {
                                                echo "Error inserting data: " . $e->getMessage();
                                            }

                                            // Close the database connection
                                            $pdo = null;
                                        }
                                        //////////////// delete manager ////////////////////////////
                                            //////////////// delete employee ////////////////////////////

                                        if (isset($_POST["delete_employee"])){
                                        $local ="localhost";
                                        $username = "root";
                                        $pass ="";
                                        $dbnamee = "multi_bussines_system";

                                        try{
                                            $pdo = new PDO("mysql:host=$local;dbname=$dbnamee", $username, $pass);
                                            $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                            $sql = "DELETE FROM employee";
                                            $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                echo '<div style="postion:absolute; top:-5px; padding:10px; height:50px" class="alert alert-success" role="alert">
                                                Successfull Delete
                                                <button style="position:absolute; right:10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>';
                                        }catch (PDOException $e) {
                                            echo " ". $e->getMessage();
                                        }
                                        $pdo = null;
                                        } 
                                        //////delete employee //////////////////////////

                                        ///////////////////// delete sales //////////////////// 
                                        if (isset($_POST["delete_sales"])){
                                            $local ="localhost";
                                            $username = "root";
                                            $pass ="";
                                            $dbnamee = "multi_bussines_system";
                                            try{
                                                $pdo = new PDO("mysql:host=$local;dbname=$dbnamee", $username, $pass);
                                                $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                $sql = "DELETE FROM sales";
                                                $stmt = $pdo->prepare($sql);
                                                    $stmt->execute();
                                                    echo '<div style="postion:absolute; top:-5px; padding:10px; height:50px" class="alert alert-success" role="alert">
                                                    Successfull Delete
                                                    <button style="position:absolute; right:10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>';
                                            }catch (PDOException $e) {
                                                echo " ". $e->getMessage();
                                            }
                                            $pdo = null;
                                            } 
                                         ///////////////////// delete sale ///////////////////////////////////

                                         //////////////////////// delete top product ////////////////////////////
                                         if (isset($_POST["delete_topproduct"])){
                                            $local ="localhost";
                                            $username = "root";
                                            $pass ="";
                                            $dbnamee = "multi_bussines_system";
                                            try{
                                                $pdo = new PDO("mysql:host=$local;dbname=$dbnamee", $username, $pass);
                                                $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                $sql = "DELETE FROM top_product";
                                                $stmt = $pdo->prepare($sql);
                                                    $stmt->execute();
                                                    echo '<div style="postion:absolute; top:-5px; padding:10px; height:50px" class="alert alert-success" role="alert">
                                                    Successfull Delete
                                                    <button style="position:absolute; right:10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>';
                                            }catch (PDOException $e) {
                                                echo " ". $e->getMessage();
                                            }
                                            $pdo = null;
                                            } 
                                          //////////////////////// delete top product ////////////////////////////
                                       
                                          /////////////////////// delete product //////////////////////
                                          if (isset($_POST["delete_product"])){
                                            $local ="localhost";
                                            $username = "root";
                                            $pass ="";
                                            $dbnamee = "multi_bussines_system";
                                            try{
                                                $pdo = new PDO("mysql:host=$local;dbname=$dbnamee", $username, $pass);
                                                $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                $sql = "DELETE FROM product";
                                                $stmt = $pdo->prepare($sql);
                                                    $stmt->execute();
                                                    echo '<div style="postion:absolute; top:-5px; padding:10px; height:50px" class="alert alert-success" role="alert">
                                                    Successfull Delete
                                                    <button style="position:absolute; right:10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>';
                                            }catch (PDOException $e) {
                                                echo " ". $e->getMessage();
                                            }
                                            $pdo = null;
                                            
                                          }
                                          ////////////////////// delete product//////////////////////////////////

                                          //////////////////////////// clear all data /////////////////////////
                                          if (isset($_POST["clear"])){
                                            $local ="localhost";
                                            $username = "root";
                                            $pass ="";
                                            $dbnamee = "multi_bussines_system";
                                            try{
                                                $pdo = new PDO("mysql:host=$local;dbname=$dbnamee", $username, $pass);
                                                $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                               // DELETE FROM product
                                                $stmtProduct = $pdo->prepare("DELETE FROM product");
                                                $stmtProduct->execute();

                                                // DELETE FROM employee
                                                $stmtEmployee = $pdo->prepare("DELETE FROM employee");
                                                $stmtEmployee->execute();

                                                // DELETE FROM sales
                                                $stmtSales = $pdo->prepare("DELETE FROM sales");
                                                $stmtSales->execute();

                                                // DELETE FROM business
                                                $stmtBusiness = $pdo->prepare("DELETE FROM business");
                                                $stmtBusiness->execute();

                                                // DELETE FROM top_product
                                                $stmtTopProduct = $pdo->prepare("DELETE FROM top_product");
                                                $stmtTopProduct->execute();
                                                
                                                    echo '<div style="postion:absolute; top:-5px; padding:10px; height:50px" class="alert alert-success" role="alert">
                                                    Successfull Delete
                                                    <button style="position:absolute; right:10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>';
                                            }catch (PDOException $e) {
                                                echo " ". $e->getMessage();
                                            }
                                            $pdo = null;
                                            
                                          }
                                          ///////////////// delete business //////////////////////////
                                          if (isset($_POST["delete_business"])){
                                            $local ="localhost";
                                            $username = "root";
                                            $pass ="";
                                            $dbnamee = "multi_bussines_system";
                                            try{
                                                $pdo = new PDO("mysql:host=$local;dbname=$dbnamee", $username, $pass);
                                                $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                $sql = "DELETE FROM business";
                                                $stmt = $pdo->prepare($sql);
                                                    $stmt->execute();
                                                    echo '<div style="postion:absolute; top:-5px; padding:10px; height:50px" class="alert alert-success" role="alert">
                                                    Successfull Delete
                                                    <button style="position:absolute; right:10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>';
                                            }catch (PDOException $e) {
                                                echo " ". $e->getMessage();
                                            }
                                            $pdo = null;
                                            } 
                                          //////////////////// delete business
                                        ?>
                        <!-----------------------------data base-------------------------------------------------->
                     

                            <!-- Button trigger modal -->   
                           <table class="hiiii">
                           <tr>
                           
                           <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="" data-bs-target="#deletetopproducts">
               Delete Top Product
               </button></td>
                           <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" id="" data-bs-target="#deleteproduct">
               Delete Product
               </button></td>
                           <td>
               <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="" data-bs-target="#deletesale">
               Delete Sale
               </button></td>
                           </tr>
                           <tr>
                           <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="" data-bs-target="#employee">
               Delete Employee
               </button></td>
                           <td>
               <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="" data-bs-target="#manager">
               Delete manager
               </button></td>
                           <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" id="" data-bs-target="#staff">
               Delete staff
               </button></td>
                           </tr>
                           <tr>
                           <td>
               <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="" data-bs-target="#business">
               Delete Business
               </button></td>
                           <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" id="" data-bs-target="#clear">
               Clear All Data
               </button></td>
                          
                           </tr>
                           </table>
                       
                     
                        <!-----------------------------mo dal-------------------------------------------------->
   
                          <?php include('header.php'); ?> 
   <!------------------------- delete  business---------------------------------->
   <div class="modal fade" id="business" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Top Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                            <div class="modal-body">
                                <h5>Are you sure do you want delete all business </h5>
                                <input hidden id="product_codee" name="ID"></input>                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary btn-danger" type="submit" name="delete_business" value="Delete">                          
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                    <!------------------------- delete business ---------------------------------->


                          <!------------------------- clear all data ---------------------------------->
                   <div class="modal fade" id="clear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Top Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                            <div class="modal-body">
                                <h5>Are you sure do you want clear all data </h5>
                                <input hidden id="product_codee" name="ID"></input>                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary btn-danger" type="submit" name="clear" value="Delete">                          
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                    <!------------------------- clear all data ---------------------------------->
      
        <!-------------------------------------------top product ------------------------>
        <div class="modal fade" id="deletetopproducts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Top Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                            <div class="modal-body">
                                <h5>Are you sure Do you want delete all data top product</h5>
                                <input hidden id="product_codee" name="ID"></input>                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary btn-danger" type="submit" name="delete_topproduct" value="Delete">                          
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                  <!-----------------------------------------top sale product------------------------>
                 
                    <!----------------------------------deleteproduct------------------------>
                    <div class="modal fade" id="deleteproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                            <div class="modal-body">
                                <h5>Are you sure do you want delete all product</h5>
                                <input hidden id="product_codee" name="ID"></input>                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary btn-danger" type="submit" name="delete_product" value="Delete">                          
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                  <!---------------------------------delete product------------------------>
                 
                 <!------------------------------ delete sale ----------------->
                 <div class="modal fade" id="deletesale" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Sale</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                            <div class="modal-body">
                                <h5>Are you sure do you want delete all sale</h5>
                                <input hidden id="product_codee" name="ID"></input>                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary btn-danger" type="submit" name="delete_sales" value="Delete">                          
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                   <!----- ============== deletesale ------------------------->
                  
                   <!-------------------------------------------Employee ------------------------>
        <div class="modal fade" id="employee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                            <div class="modal-body">
                                <h5>Are you sure Do you want delete all employee</h5>
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
                  <!-----------------------------------------Employee------------------------>
                
                                     <!-------------------------------------------staff ------------------------>
        <div class="modal fade" id="staff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                            <div class="modal-body">
                                <h5>Are you sure Do you want delete all staff</h5>
                                <input hidden id="product_codee" name="ID"></input>                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary btn-danger" type="submit" name="delete_staff" value="Delete">                          
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                  <!-----------------------------------------staff------------------------>
                 
                                     <!-------------------------------------------manager ------------------------>
        <div class="modal fade" id="manager" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                            <div class="modal-body">
                                <h5>Are you sure Do you want delete all manager</h5>
                                <input hidden id="product_codee" name="ID"></input>                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary btn-danger" type="submit" name="delete_manager" value="Delete">                          
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                  <!-----------------------------------------manager------------------------>
                 
    <!-----------------------------mo dal-------------------------------------------------->
       
                      

                    <!--bootstarp js-->
                    <?php include('footer.php');?>

                        
                    </div>
                    </div>
            </div>
          </div>
    </body>
</html>