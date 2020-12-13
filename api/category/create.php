<?php
header("Access-Control-Allow-origin: *");
header("Content-Type:aplication/json");
header("Access-Control-Allow-Methods:POST");
header("Access-control-Allow-Headers:Access-control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With");

include "../../config/Database.php";
include "../../models/Gategory.php";

$database = new Database();
$dbh = $database->conect();
$category = new Category($dbh);

//Get Raw Posted data
$data = json_decode(file_get_contents("php://input"));

$category->name = $data->name;

if ($category->create()) {
  echo json_encode(["message" => "Category Created"]);
} else {
  echo json_encode(["message" => "Category Not Created"]);
}
