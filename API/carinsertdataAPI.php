
<?php
include ("../connection.php");
header('Content-Type: application/json');

$connection = new Connection();
$conn_res = $congin->connection();

$name = $_POST['car'];
$arr = array();

if ($name != null) {
    if ($conn_res) {
        $sql = "INSERT INTO `firstflor`(`car`) VALUES ('$name')";
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
    $arr = array("status_code" => "400", "message" => "Car Name are must be required", "is_success" => "false");
    echo json_encode($arr, JSON_PRETTY_PRINT);
    http_response_code(400);
}
