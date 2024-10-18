<?php

header("Access-Control-Allow-Methods: PUT, PACHT");
header("Content-Type: application/json");

include("../config/config.php");
$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {

    $input = file_get_contents('php://input');

    parse_str($input, $_UPDATE);

    $Name = $_UPDATE['Name'];
    $Contact = $_UPDATE['Contact'];
    $Vehicle = $_UPDATE['Vehicle'];
    $Vehicle_no = $_UPDATE['Vehicle_no'];
    $Id = $_UPDATE['id'];

    $res = $config->updateUserdata($Name, $Contact, $Vehicle, $Vehicle_no, $Id);

    if ($res) {
        $arr['data'] = "Record Insered Successfully";
        http_response_code(201);
    } else {
        $arr["data"] = "Record insertion Failed";
    }
} else {
    $arr['err'] = "Only for PUT & PACHT HTTP Request is Allowed..";
}
echo json_encode($arr);

?>