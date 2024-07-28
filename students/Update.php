<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method:PUT');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

include('function.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod  == 'PUT') {

    $inputData = json_decode(file_get_contents("php://input"), true);

    if (empty($inputData)) {
        $updateCustomer = updateStudent($_POST, $_GET);
    } else {
        $updateCustomer = updateStudent($inputData, $_GET);
    }
    echo $updateCustomer;
} else {

    $data = [
        'satus' => 405,
        'message' => $requestMethod . ' Mthod Not Allowed',

    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}
