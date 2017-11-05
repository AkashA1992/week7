<?php  
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$obj = new main();

class main {
 
    public function __construct(){ 
        $serverName = "sql1.njit.edu";
        $userName = "ara59";
        $password = "CkyYZ4sSq";
        $query="SELECT * FROM accounts where id<6";     

        try {              
            $hmtlObj= createHtml::setConnection($serverName,$userName,$password,$query);               
            $result=new createHtml($hmtlObj);
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage()."<br>";
        }        
    }  
}

//Used to construct and destroy PDO connection
abstract class pdoConnection {
    protected $html;    

    public static function setConnection($serverName,$userName,$password,$query){ 
        
        $connectionString= new PDO("mysql:host=$serverName;dbname=ara59", $userName, $password);
        // set the PDO error mode to exception
        $connectionString->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully <br>";
        $stmt = $connectionString->prepare($query); 
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function __destruct(){
        $connectionString = null;  
    }
}

class createHtml extends pdoConnection{
    public function __construct($hmtlObj){
        //$result=new pdoConnection($serverName,$userName,$password,$query);
        //echo 'IN PDOCONNECTION CLASS';
        $html='';
        $html='<table border="1">';
        foreach($hmtlObj as $output){
          $html.='<tr>';
          foreach($output as $data)
            {            
            $html.='<td>'.$data.'</td>';                      
            }
          $html.='</tr>';
          }
          $html.='</table>';        
          echo $html;
    }
}
?>