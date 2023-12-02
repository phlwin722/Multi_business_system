<?php 
 session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="employee.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <title>Employee - B-MO</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="employee.js" defer></script>
        <link rel="icon" type="image/x-icon" href="/Multi_business_system/picture/sts.png">
   </head>
    <body>
        <div class="left">
        <img src="/Multi_business_system/picture/sts.png" style="height:60px; width: 80px;position:absolute; top:-4px; left:50px;" alt="">
                
                <div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-circle-user"></i></button>
                  <div id="myDropdown" class="dropdown-content">
                  <a href="Myacct.php" target="_top">My account</a>
                 </div>
              </div>
        </div>

        <div class="sidenav" id="a">
            
            <div class="companyname">Shirly Bansil</div>
                <div class="owner">Owner</div >
                   <a href="Dashboardowner.php" target="_top" class="nav"><i class="fa-solid fa-house"></i> Dash Board</a>
                   <a href="Ownersale.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Sales</a>
                   <a href="Businessowner.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Business</a>
                   <a href="product.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Products</a>
                   <a href="employee.php" target="_top" class="nav"><i class="fa-solid fa-users"></i> Employee</a>
                  <a href="/Multi_business_system/landingpage/landingpage.php" target="_top" ><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
        </div>
        
          <div class="main" id="a">

            <div class="frame" src="" name="iframe">
                <div class="addbusines">
                    <div class="product-top">Employee</div>
                    </div>
                 
                    <div class="busin-right">
                        <div class="busin-left">
                        <div id="mooove">
                             <!--------------------Insert modal---------------------->
                       <button type="button"  class="btn btn-primary " data-bs-toggle="modal"  data-bs-target="#exampleModal">
                New Employee
                </button>
                       </div>
                        <label>List of Employee</label>
   <?php 
   if (isset($_POST["submit"])) {
    $con = mysqli_connect("localhost","root","","multi_bussines_system") or die("Could connect");
 
        $id = htmlspecialchars($_POST["id"]);
       
    /* this code is check if ID was existing*/
        $verify_query = mysqli_query($con,"SELECT ID FROM employee WHERE ID='$id'");
    if (mysqli_num_rows( $verify_query ) != 0) {
        // User found, redirect to a success page
        echo'<!-- Trigger/Open The Modal -->
               <div style="
               background: #f9eded;
               border-radius:5px;
               color: red;
                width:320px;
                 height:40px;
                 padding-top:10px;
                 text-align:center;
                 position:absolute;
                  top:5px;
                  left:390px">
                  
               <h6>The ID was already taken  </h6>

            </div>'; 
            $con -> close();
    }
   
    else{
        /* this code is check if user name was existing*/
        $con = mysqli_connect("localhost","root","","multi_bussines_system") or die("Could connect");
        $username = htmlspecialchars($_POST["usernaame"]);
            $verify_username = mysqli_query($con,"SELECT Username FROM employee WHERE Username ='$username'");
         if(mysqli_num_rows( $verify_username ) != 0) {
                echo'<!-- Trigger/Open The Modal -->
                       <div style="
                       background: #f9eded;
                       border-radius:5px;
                       color: red;
                        width:320px;
                         height:40px;
                         padding-top:10px;
                         text-align:center;
                         position:absolute;
                          top:5px;
                          left:390px">
                          
                       <h6>The Username was already taken  </h6>
        
                    </div>'; 
                    $con -> close();
            }else{
                /* this code not detect the existing id and username will be insert in database*/
                $localhost = "localhost";
                $username = "root";
                $pass = "";
                $dbname = "multi_bussines_system";
        
             
                $userrname = htmlspecialchars($_POST["usernaame"]);
                $password = htmlspecialchars($_POST["password"]);  
                $branch = htmlspecialchars($_POST["branchh"]);
                $employee_category = htmlspecialchars($_POST["employee-category"]);
                $lastname = htmlspecialchars($_POST["Lastname"]);
                $firstname = htmlspecialchars($_POST["Firstname"]);
                $middle_name = htmlspecialchars($_POST["middle_name"]);
            
                      //connection database
                try {
                    $pdo = new PDO ("mysql:host=$localhost;dbname=$dbname", $username, $pass);
                    // Set the PDO error mode to exception
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
                         // // Prepare and execute the SQL query to insert data
                   $stmt = $pdo->prepare("INSERT INTO employee (ID, Username, Password, Branch, Position, Last_name, First_name, Middle_name ) VALUES (?, ? , ? , ? , ? , ? , ?, ?)");
                 $stmt->execute([$id, $userrname,  $password,  $branch,  $employee_category, $lastname,  $firstname, $middle_name  ]);
                    header ("location: employee.php");
                }
                catch (PDOException $e){
                    echo "Not inserted". $e->getMessage();
                }
            }
            $pdo = null;
        }
       
}
?>

                    <div class="List_of_product">
                    <br>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <form action="" method="post">
                            <div class="modal-body">
                                        
                                                <Label for="lastname">Last Name</Label>
                                                <input type="text" name="Lastname" required class="cc" id="lastname">
                                               
                                                <Label for="firstname">First Name</Label>
                                                <input type="text" name="Firstname" required class="cc" id="firstname">

                                                <Label for="middlename">Middle Name</Label>
                                                <input type="text" name="middle_name" required class="cc" id="middlename">

                                                <Label for="username">Username</Label>
                                                <input type="text" name="usernaame" required class="cc" id="username">
                                           
                                                <Label for="">Password</Label>
                                                <input type="text" name="password" class="cc">
                                        
                                                <label for="category-business">Choose Branch</label>
                                            <!--Chose business name-->
                                                <select class="cc" name="branchh" id="category-business">]
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
                                                   
                                                    <?php } $con->close();?>
                                                </select>
                                                       <!--Chose business name-->

                                                <label for="">Select Position</label>
                                                <select class="cc" name="employee-category" id="category-business" >
                                                    <option hidden>Select Position</option>
                                                    <option value="Manager">Manager</option>
                                                    <option value="Staff">Staff</option>
                                                  </select>                 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" name="submit" value="Save">                          
                    </div>
                    </form>
                    </div>
                </div>
                </div>     
                   <!--------------------Insert modal---------------------->


                       <!------- edit Modal ---------->
                <div class="modal fade" id="editdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="EmoployeeDatabase.php" method="post">
                            <div class="modal-body">
                                                    <Label for="id">ID</Label>
                                                <input type="text" name="id" id="idd" required readonly class="cc" id="id">
                                    
                                                <Label for="lastname">Last Name</Label>
                                                <input type="text" name="lastname" id="lname" class="cc"required>
                                               
                                                <Label for="firstname">First Name</Label>
                                                <input type="text" name="firstname" id="fname" required class="cc" id="firstname">

                                                <Label for="middlename">Middle Name</Label>
                                                <input type="text" name="middle_name" id="mi" required class="cc" id="middlename">

                                                <Label for="username">Username</Label>
                                                <input type="text" name="username" id="usernaame" required class="cc">
                                           
                                                <Label for="">Password</Label>
                                                <input type="text" name="password" id="password" class="cc">
                                        
                                                <label for="category-business">Choose Branch</label>
                                                 <!--Chose business name fetchbusiness -->
                                                 <select class="cc" name="branchp" id="branchh">]
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

                                                <label for="">Select Position</label>
                                                <select class="cc" name="employee_category" id="employee_category" >
                                                    <option hidden>Select Position</option>
                                                    <option value="Manager">Manager</option>
                                                    <option value="Staff">Staff</option>
                                                  </select>       
                                                        
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <input class="btn btn-primary" type="submit" name="savechnge" value="Save changes">                          
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
                    <form action="EmoployeeDatabase.php" method="post">
                            <div class="modal-body">
                                <h5>Are you sure Do you want delete</h5>
                                <input hidden id="employee_id" name="ID"></input>
                                
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

                        <div class="product">
                              <!--bootstarp table html-->
                        <?php include('header.php'); ?> 
                        <table class="table table-bordered table-hover">          
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Branch</th>
                            <th scope="col">Position</th>
                            <th scope="col">Lastname</th>
                            <th scope="col">Firstname</th>
                            <th scope="col">Middle initial</th>
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
                               $query = " SELECT * FROM employee";
                               $statement = $pdo->prepare($query);
                               $statement->execute();

                               // to desplay fetch all of data
                               $result = $statement->fetchALL(PDO::FETCH_ASSOC);

                               if( $result){
                                foreach ($result as $row){
                                    ?>
                                    <tr>
                                        <td class="user_id"><?= $row['ID'];?></td>
                                        <td><?= $row['Username']?></td>
                                        <td><?= $row['Password']?></td>
                                        <td><?= $row['Branch']?></td>
                                        <td><?= $row['Position']?></td>
                                        <td><?= $row['Last_name']?></td>
                                        <td><?= $row['First_name']?></td>
                                        <td><?= $row['Middle_name']?></td>
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
                         <!--bootstarp table js-->
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
                                $('#idd').val(data[0]);
                                $('#usernaame').val(data[1]);
                                $('#password').val(data[2]);
                                $('#branchh').val(data[3]);
                                $('#employee_category').val(data[4]);
                                $('#lname').val(data[5]);
                                $('#fname').val(data[6]);
                                $('#mi').val(data[7]);
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
                                $('#employee_id').val(data[0]);
                        });
                    });
                    // delete data /edit data display modal
                </script> 
                        </div>
                    </div>
            </div>
            
          </div>
          
    </body>
</html>