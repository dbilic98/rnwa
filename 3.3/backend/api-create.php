<?php
header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers, Content-Type, Acess-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);

$pend_date = $data["end_date"];
$pfirst_name = $data["first_name"];
$plast_name = $data["last_name"];
$pstart_date = $data["start_date"];
$ptitle = $data["title"];
$passigned_branch_id = $data["assigned_branch_id"];
$pdept_id = $data["dept_id"];
$psuperior_emp_id = $data["superior_emp_id"];

require_once "dbconfig.php";

$query = "INSERT INTO employee(end_date, first_name, last_name, start_date, title, assigned_branch_id, dept_id,superior_emp_id)
VALUES ('".$pend_date."','".$pfirst_name."','".$plast_name."','".$pstart_date."','".$ptitle."','".$passigned_branch_id."','".$pdept_id."','".$psuperior_emp_id."')";

if(mysqli_query($conn, $query) or die("Inert Query Faild")) {
    echo json_encode(array("message" => "Product Inserted Successfully", "status" => true));
}
else
{
    echo json_encode(array("message" => "Failed Product Not Inserted", "status" => false));
}

?>
