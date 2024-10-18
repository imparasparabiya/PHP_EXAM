<?php

header("Access-Control-Allow-Method: POST");
header("Content-Type: application/json");

include("../config/config.php");

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = $_POST['number'];

    $res = $config->insertVehicle($number);
    if ($res) {
        $arr['data'] = "Record Insered Successfully";
        http_response_code(201);
    } else {
        $arr["data"] = "Record insertion Failed";
    }
} else {
    $arr['err'] = "Only for POST HTTP Request is Allowed..";
}
echo json_encode($arr);
?>