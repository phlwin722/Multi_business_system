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
       <link rel="stylesheet" href="product.css">
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
                        ///////////////////// insert //////////////////////////////////
                                        if (isset($_POST["submitt"])) {     
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
                                                    $stmt = $pdo->prepare("INSERT INTO product ( Product_name, Price, Quantity, Branch) VALUES ( ?, ?, ? ,?)");
                                                    $stmt->execute([ $nameproduct, $priceproduct, $quantity, $businessname]);
                                                    echo '<div style="postion:absolute; top:-5px; padding:10px; height:50px" class="alert alert-success" role="alert">
                                                Successfull Insert
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
                                                echo '<div style="postion:absolute; top:-5px; padding:10px; height:50px" class="alert alert-success" role="alert">
                                                Successfull Edited
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
                                                echo '<div style="postion:absolute; top:-5px; padding:10px; height:50px" class="alert alert-danger" role="alert">
                                                Successfull Delete
                                                <button style="position:absolute; right:10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>';
                                        }catch (PDOException $e) {
                                            echo " ". $e->getMessage();
                                        }
                                        $pdo = null;
                                        } //////delete data  product
                                        ?>
                        <!-----------------------------data base-------------------------------------------------->
                     

                            <!-- Button trigger modal -->   
                         
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="" data-bs-target="#deletetopproducts">
                Delele Top Product
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="" data-bs-target="#deleteproduct">
                Delele Product
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="" data-bs-target="#deletesale">
                Delele Sale
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="" data-bs-target="#employee">
                Delele Employee
                </button>
                           <div class="List_of_product">
                       
                       
                     
                        <!-----------------------------mo dal-------------------------------------------------->
   
                          <?php include('header.php'); ?> 
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
                        <input class="btn btn-primary btn-danger" type="submit" name="delete_employee" value="Delete">                          
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
                        <input class="btn btn-primary btn-danger" type="submit" name="delete_employee" value="Delete">                          
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
                        <input class="btn btn-primary btn-danger" type="submit" name="delete_employee" value="Delete">                          
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
                 
    <!-----------------------------mo dal-------------------------------------------------->
       
                      

                    <!--bootstarp js-->
                    <?php include('footer.php');?>

                        
                    </div>
                    </div>
            </div>
          </div>
    </body>
</html>