<?php 
session_start();
error_reporting(0);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json;");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "functions.php";
    $currentUserId = $_SESSION['auth_user']['id'];
    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if ($requestMethod == "POST") {
        
        $inputData = json_decode(file_get_contents("php://input"), true);

        if (empty($inputData)) {
            // when sending via form
            $addedComment = addComment($_POST, $currentUserId);
        } else {
            // when sending via AJAX/ raw whatever
            $addedComment = addComment($inputData, $currentUserId);
        }
        echo $addedComment;

    } else {
        $data = [
            'status' => 405,
            'message' => $requestMethod . ' Method Not Allowed'
        ];
        header("HTTP/1.1 405 Method Not Allowed");
        echo json_encode($data);
    }

?>