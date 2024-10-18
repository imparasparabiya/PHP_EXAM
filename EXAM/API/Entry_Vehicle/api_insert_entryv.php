<?php

header("Access-Control-Allow-Method: POST");
header("Content-Type: application/json");

include("../../config/config.php");

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Vehicle = $_POST['Vehicle'];
    $Vehicle_no = $_POST['Vehicle_no'];

    $res = $config->insertEntryVehicle($Vehicle, $Vehicle_no);
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