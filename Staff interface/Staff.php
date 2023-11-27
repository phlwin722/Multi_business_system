<?php
session_start();
?>
<?php 
      $id = $_SESSION ["id"];
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
        <link rel="icon" type="image/x-icon" href="/Sad-Activity/picture/logo.png">
       
    </head>
    <body onload="renderTime();">
        <div class="container-1">
        <img src="/Sad-Activity/picture/logo.png" class="move" style="width: 40px;margin-top: 10px;margin-left: 20px;" alt="">
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
         <label for="">Enter Product Code</label>
         <input type="search" name="" id="search">

         <div class="salestable">
         <?php include ('header.php')?>
         
         <table class="table table-bordered table-hover">          
                        <thead>
                            <tr>
                            <th scope="col">Quantity</th>
                            <th scope="col">Product Code</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">#</th>
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
                                        <td><?= $row['Position']?></td>
                                        <td><?= $row['Last_name']?></td>
                                        <td><?= $row['First_name']?></td>
                                        <td><?= $row['Middle_name']?></td>
                                        <td>  
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

         <?php include ('footer.php')?>
         </div>
            <div id="clock-display" class="clock-display"></div>
        </div>



        <div class="container-3">
          <img class="logo_business" src="/Multi_business_system/picture/logo.png" alt="">
         <div class="tot">
            <label class="total_label" for="">Total</label>
            <input class="total_input" type="text" readonly>
           <button> <input type="submit"value="Purchase"></button>
         </div>
        </div>
    </body>
</html>