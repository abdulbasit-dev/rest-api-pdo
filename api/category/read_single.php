<?php
header("Access-Control-Allow-origin: *");
header("Content-Type:aplication/json");

include "../../config/Database.php";
include "../../models/Gategory.php";

$database = new Database();
$dbh = $database->conect();
$category = new Category($dbh);

$category->id = isset($_GET['id']) ? $_GET['id'] : die();
$stmt = $category->getSingleCategory();

//create array  to show 
$category_arr = [
  "id" => $category->id,
  "name" => $category->name,
  "created-at" => $category->created_at
];

//convert to json
echo json_encode($category_arr);
