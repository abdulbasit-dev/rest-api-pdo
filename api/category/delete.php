<?php
header("Access-Control-Allow-origin: *");
header("Content-Type:aplication/json");
header("Access-Control-Allow-Methods:DELETE");
header("Access-control-Allow-Headers:Access-control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With");

include "../../config/Database.php";
include "../../models/Gategory.php";

$database = new Database();
$dbh = $database->conect();
$category = new Category($dbh);

//get id from row 
$data = json_decode(file_get_contents("php://input"));
$category->id = $data->id;

if ($category->delete()) {
  echo json_encode(["message" => "Category Deleted"]);
} else {
  echo json_encode(["message" => "Category not Deleted"]);
}
