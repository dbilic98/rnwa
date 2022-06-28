<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers, Content-Type, Acess-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);

$id = $data["emp_id"];


//require_once "dbconfig.php";
include 'dbconfig.php';

$query = "DELETE FROM employee WHERE EMP_ID='".$id."' ";

if (mysqli_query($conn, $query) or die("Delete Query Faild")) {
    echo json_encode(array("message" => "Product Delete Successfully", "status" => true));
} else {
    echo json_encode(array("message" => "Failed Product Not Delete", "status" => false));
}
?>