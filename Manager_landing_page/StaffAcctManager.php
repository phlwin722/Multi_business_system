<?php 
 session_start();
?>
<?php 
    $middlename = $_SESSION ['middlename'];
    $lastname = $_SESSION ['lastname'];
    $fname = $_SESSION ['fname'];
    $branch = $_SESSION ['branch'];
    $position =$_SESSION ['position'];
    $id = $_SESSION ['id'];

   
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="Staffacctmanager.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <title>Staff - B-MO</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="StaffAcctManager.js" defer></script>
        <link rel="icon" type="image/x-icon" href="/Multi_business_system/picture/sts.png">
    </head>
    <body>
        <div class="left">
        <img src="/Multi_business_system/picture/sts.png" style="height:60px; width: 80px;position:absolute; top:-4px; left:50px;" alt="">
               </div>
              </div>
        </div>

        <div class="sidenav" id="a">
            
            <div class="companyname"><?php echo $branch ?></div>
                <div class="owner">
                    <h6><?php echo $fname ." ". $middlename ." ". $lastname ?></h6>
                    <h6><?php echo $position?></h6>
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
                    <div class="product-top">Staff Account</div>
                    </div>
                 
                    <div class="busin-right">
                        <div class="busin-left">
                        <div id="mooove">
                             <!--------------------Insert modal---------------------->
                       <button type="button"  class="btn btn-primary " data-bs-toggle="modal"  data-bs-target="#exampleModal">
                New Staff
                </button>
                       </div>
                        <label>List of Staff</label>
                        <?php 
 if (isset($_POST["submit"])) {
    
        /* this code is check if user name was existing*/
        $con = mysqli_connect("localhost","root","","multi_bussines_system") or die("Could connect");
        $username = htmlspecialchars($_POST["usernaame"]);
            $verify_username = mysqli_query($con,"SELECT Username FROM employee WHERE Username ='$username'");
         if(mysqli_num_rows( $verify_username ) != 0) {
            echo '<div style="postion:absolute; top:20px; padding:5px; height:40px" class="alert alert-danger" role="alert">
            The username has already taken
            <button style="position:absolute; right:10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
          $stmt = $pdo->prepare("INSERT INTO employee ( Username, Password, Branch, Position, Last_name, First_name, Middle_name ) VALUES ( ? , ? , ? , ? , ? , ?, ?)");
        $stmt->execute([ $userrname,  $password,  $branch,  $employee_category, $lastname,  $firstname, $middle_name  ]);
                echo '<div style="postion:absolute; top:20px; padding:5px; height:40px" class="alert alert-success" role="alert">
                Successfull Save
                <button style="position:absolute; right:10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
       }
       catch (PDOException $e){
           echo "Not inserted". $e->getMessage();
       }
            }
            $pdo = null;
        }
        

////////////////////////////////////////////////////// Insert //////////////////////////////////////////
         ////////////////////////////////////////// editdata
     if (isset($_POST['savechnge'])){
        $id = htmlspecialchars($_POST['id']);
        $usern = htmlspecialchars    ($_POST['username']);
        $passw= htmlspecialchars ($_POST['password']);
        $branche = htmlspecialchars  ($_POST['branchp']);
        $employeecategory = htmlspecialchars($_POST['employee_category']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $middle_name = htmlspecialchars($_POST['middle_name']);
        
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
                $stmt = $pdo->prepare("UPDATE employee SET Username= ?, Password= ? , Branch = ? ,Position = ? ,Last_name = ?,First_name= ? ,Middle_name = ?  WHERE ID=?");
                $stmt->execute ([$usern, $passw, $branche ,$employeecategory ,$lastname , $firstname , $middle_name, $id]);
                echo '<div style="postion:absolute; top:20px; padding:5px; height:40px" class="alert alert-success" role="alert">
                Successfull Save Change
                <button style="position:absolute; right:10px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
           } catch (PDOException $e) {
               echo "Error inserting data: " . $e->getMessage();
           }
   
           // Close the database connection
           $pdo = null;
    }
      // editdata

      // delete employee
      if (isset($_POST["delete_employee"])){
        $local ="localhost";
        $username = "root";
        $pass ="";
          $dbnamee = "multi_bussines_system";
        $ID = htmlspecialchars($_POST["ID"]);

        try{
            $pdo = new PDO("mysql:host=$local;dbname=$dbnamee", $username, $pass);
            $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM employee WHERE ID = :ID";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':ID', $ID);
                $stmt->execute();
                echo '<div style="postion:absolute; top:20px; padding:5px; height:40px" class="alert alert-success" role="alert">
                Successfull Delete
                <button style="margin-left:870px" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }catch (PDOException $e) {
            echo " ". $e->getMessage();
        }
        $pdo = null;
    }
 //delete data
      //delete employee
?>
                    <div class="List_of_product">
                        
                    <br>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " id="trr">
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Staff</h1>
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
                                        
                                                <label for="category-business">Branch</label>
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
                                                    <input type="text" readonly name="branchh" class="cc" value="<?php echo $c ['Business_name']?>">
                                                    <?php } $con->close();?>
                                                       <!--Chose business name-->

                                                <label for="">Position</label>
                                                <input type="text" name="employee-category" readonly class="cc" value="Staff">                           
                                                       
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
                <div class="modal-dialog " id="trr" >
                    <div class="modal-content  modal-dialog-scrollable" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                            <div class="modal-body">  
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
                                        
                                                <label for="category-business">Branch</label>
                                                 <!--Chose business name fetchbusiness -->
                                                
                                                <?php
                                                    $server = 'localhost';
                                                    $usner = 'root';
                                                    $pass= '';
                                                    $dbname = 'multi_bussines_system';

                                                    $con = mysqli_connect($server, $usner, $pass,$dbname);
                                                    $category = mysqli_query($con,"SELECT * FROM business WHERE Business_name='$branch'");
                                                    while ($c = mysqli_fetch_array($category)) {
                                                ?>
                                                    <input type="text" class="cc" readonly  name="branchp" id="branchh" value="<?php echo $c ['Business_name']?>">
                                
                                                    <?php }$con->close();?>
                                               
                                                       <!--Chose business name-->

                                                       
                                                <label for="">Position</label>
                                                    <input type="text" class="cc" readonly name="employee_category" id="employee_category" value="Staff">
                                                    <input type="text" hidden name="id" id="idd" required readonly class="cc" id="id">
                                    
                 
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
                    <div class="modal-content modal-dialog-scrollable" id="hello" >
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Business</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                            <div class="modal-body">
                                <h5>Are you sure do you want delete</h5>
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

                        <div class="product"  id="scrollableDiv" id="tableee">
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
                        $staff = "Staff";

                        try {
                            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // prepare and execute a query
                            $sql = "SELECT * FROM employee WHERE Branch = :branch AND Position = :position";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(":branch", $branch);
                            $stmt->bindParam(":position", $staff);
                            $stmt->execute();

                            // to display fetch all of the data
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td class="user_id"><?= $row['ID']; ?></td>
                                    <td><?= $row['Username'] ?></td>
                                    <td><?= $row['Password'] ?></td>
                                    <td><?= $row['Branch'] ?></td>
                                    <td><?= $row['Position'] ?></td>
                                    <td><?= $row['Last_name'] ?></td>
                                    <td><?= $row['First_name'] ?></td>
                                    <td><?= $row['Middle_name'] ?></td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-sm edit-data"> <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i> </a>
                                        <a href="#" class="btn btn-danger btn-sm delete-data"> <i class="fa-solid fa-trash" style="color: #ffffff;"></i> </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }

                        $pdo = null;
                        ?>
                          
                        </tbody>
            
                      </div>
                    </table>
                         <!--bootstarp table js-->
                    <?php include('footer.php');?>
                    <div id="liveAlertPlaceholder"></div>
                    <script> 
                             const alertPlaceholder = document.getElementById('liveAlertPlaceholder');

                        const appendAlert = (message, type) => {
                            const wrapper = document.createElement('div');
                            wrapper.innerHTML = [
                                `<div class="alert alert-${type} alert-dismissible" role="alert">`,
                                `   <div>${message}</div>`,
                                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                                '</div>'
                            ].join('');

                            alertPlaceholder.append(wrapper);
                        };

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
