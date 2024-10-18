<?php
header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json");

include("../config/config.php");

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $input = file_get_contents('php://input');

    parse_str($input, $_DELETE); // convert String 

    $id = $_DELETE['id'];
    $res = $config->deleteUsardata($id);
    if ($res) {
        $arr['data'] = "Record Deleted Successfully...";
    } else {
        $arr["data"] = "Record Deletion Failed...";
    }
} else {

    $arr["err"] = "Only DELET HTTP Request Method is allowed...";
}

echo json_encode($arr);
?>