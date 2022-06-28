<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: PUT");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers, Content-Type, Acess-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);

$id = $data["emp_id"];
$pend_date = $data["end_date"];
$pfirst_name = $data["first_name"];
$plast_name = $data["last_name"];
$pstart_date = $data["start_date"];
$ptitle = $data["title"];
$passigned_branch_id = $data["assigned_branch_id"];
$pdept_id = $data["dept_id"];
$psuperior_emp_id = $data["superior_emp_id"];


//require_once "dbconfig.php";
include 'dbconfig.php';

echo $query = "UPDATE employee SET END_DATE='".$pend_date."',
                                   FIRST_NAME='".$pfirst_name."',
                                   LAST_NAME='".$plast_name."',
                                   START_DATE='".$pstart_date."',
                                   TITLE='".$ptitle."',
                                   ASSIGNED_BRANCH_ID='".$passigned_branch_id."',
                                   DEPT_ID='".$pdept_id."',
                                   SUPERIOR_EMP_ID='".$psuperior_emp_id."'
                                   WHERE EMP_ID= '".$id."'
                                   ";


if (mysqli_query($conn, $query) or die("Update Query Faild")) {
    echo json_encode(array("message" => "Product Update Successfully", "status" => true));
} else {
    echo json_encode(array("message" => "Failed Product Not Updated", "status" => false));
}
?>