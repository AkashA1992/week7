<?php  
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$serverName = "sql1.njit.edu";
$userName = "ara59";
$password = "CkyYZ4sSq";

    try {        
         $connectionString= new PDO("mysql:host=$serverName;dbname=ara59", $userName, $password);
        // set the PDO error mode to exception
        $connectionString->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $connectionString->prepare("SELECT * FROM accounts where id<6"); 
        $stmt->execute();
              
        
        
        
        $html='';
        $html='<table border="1">';
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        //print_r($result);
        
        foreach($result as $output){
        $html.='<tr>';
        foreach($output as $data)
          {        
          //for($i=0;$i<count($result);$i++){
          $html.='<td>'.$data.'</td>';
          //$html.=$;
          
          }
          $html.='</tr>';
        }
        $html.='</table>';        
        
        echo $html;
        echo "<br> <br> Connected successfully <br>";     
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage()."<br>";
    }    
$connectionString = null;    
?>