<?php
session_start();
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

               $id = $_SESSION ["id"];
                
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
            <div id="clock-display" class="clock-display"></div>
        </div>
        <div class="container-3">
            <table>
                <tr>
                    <th>Quantity</th>
                    <th>Name Product</th>
                    <th>Price</th>
                </tr>
              
            </table>
            <div class="foot">
               <div class="footer_color">
                <label for="" class="tot">Total</label>
                <label for="" class="total">Total</label>
                <input class="submit" type="submit" value="Pay">
               </div>
            </div>
        </div>
    </body>
</html>