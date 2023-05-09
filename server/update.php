<?php 
error_reporting(0);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json;");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "functions.php";

    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if ($requestMethod == "PUT") {
        
        $inputData = json_decode(file_get_contents("php://input"), true);

        if (empty($inputData)) {
            // when sending via form
            $updatedCustomer = updateArticle($_POST, $_GET);
        } else {
            // when sending via AJAX/ raw whatever
            $updatedCustomer = updateArticle($inputData, $_GET);
        }
        echo $updatedCustomer;

    } else {
        $data = [
            'status' => 405,
            'message' => $requestMethod . ' Method Not Allowed'
        ];
        header("HTTP/1.1 405 Method Not Allowed");
        echo json_encode($data);
    }

?>