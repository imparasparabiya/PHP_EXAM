<?php

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

include("../config/config.php");

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];

    $res = $config->fetchSingleUserdata($id);

    $result = mysqli_fetch_assoc($res);

    if ($result) {
        $arr['data'] = $result;
    } else {
        $arr['err'] = "Data not Found";
    }
} else {
    $arr["err"] = "Only GET HTTP Request Methods is Allow..";
}
echo json_encode($arr);

?>