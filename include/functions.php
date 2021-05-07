<?php
/*
* Author: Antony Rayn
* Version: 0.0.1
* Date: 03-05-2021
* App Name: FCSTMR Type
*/
class Functions{
  public $connect;  
  private $host = "localhost";  
  private $username = 'root';
  private $password = '';  
  private $database = 'ded';  
  function __construct()  
  {  
     $this->database_connect();  
 }  
 public function database_connect()  
 {  
    $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);
 }  
 public function execute_query($query)  
 {  
     return mysqli_query($this->connect, $query);  
 }    
 public function get_data_in_table($query)  
 { 
    $responses = array();
    $result = $this->execute_query($query);
    while($row = mysqli_fetch_array($result))
    {
        //echo $row['name']."<br>";
        /*$response['aid']=$row['aid'];
        $response['id']=$row['id'];
        $response['name']=$row['name'];
        $response['magento_id']=$row['magento_id'];
        $responses['data']=$response;*/
        $responses['data']['aid']=$row['aid'];
        $responses['data']['id']=$row['id'];
        $responses['data']['name']=$row['name'];
        $responses['data']['magento_id']=$row['magento_id'];

    } //exit;
    //echo "<pre>"; print_r($responses);
    return $responses;
}
public function fcstmrTypeList($id="",$name="",$magent_id="")
{
        //if()
    $sql = "SELECT * FROM fcstmr_type WHERE id = '".$id."' AND name = '".$name."' AND magento_id='".$magent_id."'";
    $check =  $this->db->query($sql) ;
} 
}
?>