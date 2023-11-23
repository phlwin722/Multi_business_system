
   <?php
   // Validate form data
   // insert data
    if(isset($_POST['save'])) {
           $name = htmlspecialchars($_POST["name_business"]);
           $location = htmlspecialchars($_POST["location"]);
      
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
   
               // Prepare and execute the SQL query to insert data
               $stmt = $pdo->prepare("INSERT INTO business (Business_name, location) VALUES (?, ?)");
               $stmt->execute([$name, $location]);
   
               header ('Location: Businessowner.php');
           } catch (PDOException $e) {
               echo "Error inserting data: " . $e->getMessage();
           }
   
           // Close the database connection
           $pdo = null;
      // insert data
   }
    // editdata
     if (isset($_POST['savechanges'])){
        $businessname = htmlspecialchars($_POST['name_business']);
        $location = htmlspecialchars($_POST['location']);   
        $personid = htmlspecialchars($_POST['pesonidd']);
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
                $stmt = $pdo->prepare("UPDATE business SET Business_name = ? , location=? WHERE Business_ID=?");
                $stmt->execute ([$businessname, $location,$personid]);

               header ('Location: Businessowner.php');
           } catch (PDOException $e) {
               echo "Error inserting data: " . $e->getMessage();
           }
   
           // Close the database connection
           $pdo = null;
    }
      // editdata

    //delete data
    if (isset($_POST['delete'])){
        $local ="localhost";
        $username = "root";
        $pass ="";
          $dbnamee = "multi_bussines_system";

        $business_id = htmlspecialchars($_POST["business_id"]);

        try{
            $pdo = new PDO("mysql:host=$local;dbname=$dbnamee", $username, $pass);
            $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM business WHERE Business_ID = :business_id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':business_id', $business_id);
                $stmt->execute();

                $_SESSION['message'] ="Successfull deleted";
                header ('Location: Businessowner.php');
        }catch (PDOException $e) {
            echo " ". $e->getMessage();
        }
        $pdo = null;
    }
 //delete data
   ?>
    