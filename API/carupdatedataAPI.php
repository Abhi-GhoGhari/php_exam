
<?php
include ("../connection.php");
header('Content-Type: application/json');

$connection = new Connection();
$conn_res = $connection->connect();

header('Content-Type: application/json');

$name = $_POST['car'];
$id = $_POST['id'];
$arr = array();

if ($id != null && $name != null) {
    if ($conn_res) {
        $sql = "UPDATE `firstflor` SET `car` = '$name' WHERE `id`= $id";
        $response = mysqli_query($conn_res, $sql);
        if ($response) {
            $arr = array("status_code" => "200", "message" => "Data Update Successfully", "is_success" => "true");
            echo json_encode($arr, JSON_PRETTY_PRINT);
            http_response_code(200);
        } else {
            $arr = array("status_code" => "500", "message" => "Data Update Failed", "is_success" => "false");
            echo json_encode($arr, JSON_PRETTY_PRINT);
            http_response_code(500);
        }
    } else {
        $arr = array("status_code" => "500", "message" => "Connection Failed", "is_success" => "false");
        echo json_encode($arr, JSON_PRETTY_PRINT);
        http_response_code(500);
    }
} else {
    $arr = array("status_code" => "400", "message" => "Id and Car name are must be required", "is_success" => "false");
    echo json_encode($arr, JSON_PRETTY_PRINT);
    http_response_code(400);
}
