<?php

header("Access-Control-Allow-origin: *");
header("Content-Type:aplication/json");
header("Access-Control-Allow-Methods:PUT");
header("Access-control-Allow-Headers:Access-control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With");

include "../../config/Database.php";
include "../../models/Gategory.php";

$database = new Database();
$dbh = $database->conect();
$category = new Category($dbh);

//get data from raw
$data = json_decode(file_get_contents("php://input"));

$category->id = $data->id;
$category->name = $data->name;

if ($category->update()) {
  echo json_encode(["message" => "Category updated"]);
} else {
  echo json_encode(["message" => "Category not updated"]);
}
