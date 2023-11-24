<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="Businesowner.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <title>Business - BUIMO</title>
        <link rel="icon" type="image/x-icon" href="/Sad-Activity/picture/logo.png">
        <script src="Bussineowner.js" defer></script>

    </head>
    <body>
        <div class="left">
            <img src="/Multi_business_system/picture/logo.png" style="width: 30px;position:absolute; top:10px; left:20px;" alt="">
            <div class="Company">BUIMO</div>
                <div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-circle-user"></i></button>
                  <div id="myDropdown" class="dropdown-content">
                  <a href="Myacctowner.php" target="_top">My account</a>
                 </div>
              </div>
        </div>

        <div class="sidenav" id="a">
            <div class="companyname">Dexter Jamero</div>
                <div class="owner">Owner</div >
                   <a href="Dashboardowner.php" target="_top" class="nav"><i class="fa-solid fa-house"></i> Dash Board</a>
                   <a href="Saleowner.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Sales</a>
                   <a href="Businessowner.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Business</a>
                   <a href="product.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Products</a>
                   <a href="employee.php" target="_top" class="nav"><i class="fa-solid fa-users"></i> Employee</a>
                   
               <a href="/Multi_business_systemy/landingpage/landingpage.php"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
        </div>
        
          <div class="main" id="a">
            <div class="frame" src="" name="iframe">
                <div class="addbusines">
                    <div class="product-top">Business</div>
                    </div>
                    <div class="busin-right">
                        <div class="sale">
                            <label>List of Business</label>
                             <!-- insert Modal -->
                             
                        <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="moove" data-bs-target="#exampleModal">
                New Business
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Business</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="Businessownerdatabase.php" method="post">
                            <div class="modal-body">
                                <label for="">Name of Business</label>
                                <input class="in" type="text" name="name_business" required>
                                <label for="">Location</label>
                                <input class="in" type="text" required name="location">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" name="save" value="Save">                          
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                   <!-- insert Modal -->

                    <!-- edit Modal -->
                <div class="modal fade" id="editdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Business</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="Businessownerdatabase.php" method="post">
                            <div class="modal-body">
                                <label for="">Name of Business</label>
                                <input class="in" type="text" id="name_business"name="name_business" required>
                                <label for="">Location</label>
                                <input class="in" type="text" id="location" required name="location">
                                <input hidden id="pesonidd" name="pesonidd"></input>
                                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" name="savechanges" value="Save changes">                          
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                   <!-- edit Modal -->

                    <!-- delete Modal -->
                <div class="modal fade" id="deletedata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Business</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="Businessownerdatabase.php" method="post">
                            <div class="modal-body">
                                <h5>Are you sure Do you want delete</h5>
                                <input hidden id="pesoniddd" name="business_id"></input>
                                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary btn-danger" type="submit" name="delete" value="Delete">                          
                    </div>
                    </form>
                    </div>
                </div>
                </div>
                   <!-- delete Modal -->

      <div class="list_business"> 
          <div class="card-body">

           <!--Bootstrap for header css-->
             <?php include('header.php'); ?> 

              <table class="table table-bordered table-hover">          
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Business name</th>
                            <th scope="col">Address</th>
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
                               $query = " SELECT * FROM business";
                               $statement = $pdo->prepare($query);
                               $statement->execute();

                               // to desplay fetch all of data
                               $result = $statement->fetchALL(PDO::FETCH_ASSOC);

                               if( $result){
                                foreach ($result as $row){
                                    ?>
                                    <tr>
                                        <td class="user_id"><?= $row['Business_ID'];?></td>

                                        <td><?= $row['Business_name']?></td>
                                        <td><?= $row['location']?></td>
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
                    //edit update data display modal
                    $(document).ready(function() {
                        $('.edit-data').on ('click',function(){
                            $('#editdata').modal('show');

                            $tr = $(this).closest('tr');
                            var data = $tr.children("td").map(function(){
                               return $(this).text();
                            }).get();
                                $('#pesonidd').val(data[0]);
                                $('#name_business').val(data[1]);
                                $('#location').val(data[2]);
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
                                $('#pesoniddd').val(data[0]);
                        });
                    });
                    // delete data /edit data display modal
                </script> 
                </div>
            </div>
          </div>
       </body>
</html>