<?php
require_once 'include/functions.php'; 
 $object = new Functions();
 if(isset($_REQUEST["action"]))  
 {  
      if($_REQUEST["action"] == "view")  
      {  
           echo json_encode($object->get_data_in_table("SELECT * FROM fcstmr ORDER BY aid DESC"));  
      }
      /*if($_POST["action"] == "Insert")  
      {  
           $first_name = mysqli_real_escape_string($object->connect, $_POST["first_name"]);  
           $last_name = mysqli_real_escape_string($object->connect, $_POST["last_name"]);  
           $image = $object->upload_file($_FILES["user_image"]);  
           $query = "  
           INSERT INTO users  
           (first_name, last_name, image)   
           VALUES ('".$first_name."', '".$last_name."', '".$image."')  
           ";  
           $object->execute_query($query);  
           echo 'Data Inserted';  
      }*/ 
 } 
 ?>