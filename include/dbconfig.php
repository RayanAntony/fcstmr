<?php
class dbconfig{
    /*private $servername = "localhost";
    private $username = "root";
    private $password = "";
    public $db = "ded";*/

    function __construct() {
        try{
            $link = new mysqli('localhost', 'root', '', 'ded');
            if(!$link) {
              throw new exception(mysqli_error($link));
          }
          return $link;
      }catch (Exception $e) {
         echo "Error: ".$e->getMessage();
     } 
 }

 /*protected function connect() {
   try {
    echo "hereeeeeeeeeeeeeeeeeee";
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
} 
}*/

    /*public function Close(){  
        try{
            $pdo = new PDO("mysql:host=localhost;dbname=demo", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connect Successfully. Host info: " . 
            $pdo->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
        } catch(PDOException $e){
            die("ERROR: Could not connect. " . $e->getMessage());
        }
        unset($pdo);
    }*/
}
?>