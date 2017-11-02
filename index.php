<?php

$serverName = "sql1.njit.edu";
$userName = "ara59";
$password = "CkyYZ4sSq";

    try {        
         $connectionString= new PDO("mysql:host=$serverName;dbname=ara59", $userName, $password);
        // set the PDO error mode to exception
        $connectionString->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully <br>";     
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage()."<br>";
    }    
?>