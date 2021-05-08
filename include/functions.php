<?php
/*
* Author: Antony Rayn
* Version: 1.0
* Date: 03-05-2021
* App Name: FCSTMR Type
* Description: All database transactions will be done here
*/
session_start();
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

public function check_user_exists($query)
{
    $result = $this->execute_query($query);
    return mysqli_fetch_array($result);
}
public function get_data_in_table($query)  
{
    $result = $this->execute_query($query);
    $responses['data'] = array();
    while($row = mysqli_fetch_array($result))
    {
        $responses['data'][] = array(
            "aid" => $row['aid'], 
            "id" => $row['id'], 
            "name" => $row['name'],
            "magento_id" => $row['magento_id']
        );

    }
    return $responses;
}
}
?>