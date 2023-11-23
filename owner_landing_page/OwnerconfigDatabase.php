<?php
    $servername="localhost";
    $username = "root";
    $password = "";

    try  {
        $con =new PDO ("mysql:host=$servername;mydb=multi_bussines_system", $username, $password );
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo"Successfully connected";
}catch(PDOException $e){
    echo "not connected". $e->getMessage();
}

?>