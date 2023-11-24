
<?php
   // Validate form data
   $errors = [];
   // insert data
   if (isset($_POST["upload"])) {     
           $productcode = htmlspecialchars($_POST["productcode"]);
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
               $stmt = $pdo->prepare("INSERT INTO product (Product_code	, Product_name, Price, Quantity, Branch) VALUES (?, ?, ?, ? ,?)");
               $stmt->execute([$productcode, $nameproduct, $priceproduct, $quantity, $businessname]);
   
               header ('Location: Product.php');
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

           header ('Location: Product.php');
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
            header ('Location: Product.php');
    }catch (PDOException $e) {
        echo " ". $e->getMessage();
    }
    $pdo = null;
} //////delete data  product
   ?>