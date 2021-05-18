<?php

namespace include;

/*
* Author: Antony Rayn
* Version: 1.0
* Date: 03-05-2021
* App Name: FCSTMR Type
* Description: All database transactions will be done here
*/
session_start();
class Functions
{
    public $connect;
    private $host = "localhost";
    private $username = 'root';
    private $password = '';
    private $database = 'ded';
    public function __construct()
    {
          $this->databaseConnect();
    }

    public function databaseConnect()
    {
        $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }

    public function executeQuery($query)
    {
        return mysqli_query($this->connect, $query);
    }

    public function checkUserExists($query)
    {
        $result = $this->executeQuery($query);
        return mysqli_fetch_array($result);
    }
    public function getDataInTable($query)
    {
        $result = $this->executeQuery($query);
        $responses['data'] = array();
        while ($row = mysqli_fetch_array($result)) {
            $responses['data'][] = array(
            "aid"        => $row['aid'],
            "id"         => $row['id'],
            "name"       => $row['name'],
            "magento_id" => $row['magento_id'],
            "action"     => '<span edit_id = "'.$row['aid'].'" onclick = "editFCSTMRType(this);"> <i class = "fa fa-pencil-square-o"> </i> </span> | <span delete_id = "'.$row['aid'].'" onclick = "deleteFCSTMRType(this);"> <i class="fa fa-trash-o"> </i> </span>'
            );
        }
        return $responses;
    }
}
