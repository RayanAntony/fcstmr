<?php
/*
* Author: Antony Rayn
* Version: 1.0
* Date: 03-05-2021
* App Name: FCSTMR Type
* Description: All CRUD operations will be done here based on selected action
*/
include_once __DIR__.'/include/Functions.php';
use include\Functions;
$object = new Functions();
if (isset($_REQUEST["action"])) {
    if ($_REQUEST["action"] == "login") {
        if ($_REQUEST["username"] != '' && $_REQUEST["password"] != '') :
            $username = mysqli_real_escape_string($object->connect, $_REQUEST["username"]);
            $password = mysqli_real_escape_string($object->connect, md5($_REQUEST["password"]));
            $login_check = $object->checkUserExists("SELECT * FROM user WHERE username='" . $username . "' AND password='" . $password . "'");
            if ($login_check != '') :
                $_SESSION['user_id'] = $login_check['id'];
                $response = array("status" => 1,"message" => "Login success");
            else :
                $response = array("status" => 0,"message" => "Invalid username and password");
            endif;
        else :
            $response = array("status" => 0,"message" => "Username and password are required");
        endif;
        echo json_encode($response);
    }

    if ($_REQUEST["action"] == "view") {
        echo json_encode($object->getDataInTable("SELECT * FROM fcstmr"));
    }

    if ($_REQUEST["action"] == "upsert") {
        $upsert_fcstmr_aid = mysqli_real_escape_string($object->connect, $_REQUEST["upsert_fcstmr_aid"]);
        $fcstmr_id = mysqli_real_escape_string($object->connect, $_REQUEST["fcstmr_id"]);
        $fcstmr_name = mysqli_real_escape_string($object->connect, $_REQUEST["fcstmr_name"]);
        $magento_id = mysqli_real_escape_string($object->connect, $_REQUEST["magento_id"]);
        if ($upsert_fcstmr_aid != '') :
            $query = "UPDATE fcstmr SET id = '" . $fcstmr_id . "', name = '" . $fcstmr_name . "', magento_id = '" . $magento_id . "' WHERE aid ='" . $upsert_fcstmr_aid . "'";
            $object->executeQuery($query);
            $response = array("heading" => "FCSTMR Type","message" => "Updated Successfully","icon" => "success");
        else :
            $query = "INSERT INTO fcstmr (id, name, magento_id) VALUES ('" . $fcstmr_id . "', '" . $fcstmr_name . "', '" . $magento_id . "')";
            $object->executeQuery($query);
            $response = array("heading" => "FCSTMR Type","message" => "Added Successfully","icon" => "success");
        endif;
        echo json_encode($response);
    }

    if ($_REQUEST["action"] == "edit") {
        if ($_REQUEST["edit_fcstmraid"] != '') :
            echo json_encode($object->getDataInTable("SELECT * FROM fcstmr WHERE aid='" . $_REQUEST["edit_fcstmraid"] . "'"));
        endif;
    }

    if ($_REQUEST["action"] == "delete") {
        if ($_REQUEST["delete_fcstmraid"] != '') :
            $query = "DELETE FROM fcstmr WHERE aid = '" . $_REQUEST["delete_fcstmraid"] . "'";
            $object->executeQuery($query);
            $response = array("heading" => "FCSTMR Type","message" => "Deleted Successfully","icon" => "success");
            echo json_encode($response);
        endif;
    }

    if ($_REQUEST["action"] == "logout") {
        session_unset();
        session_destroy();
        header("Location:index.php");
    }
}
