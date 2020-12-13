<?php
header("Access-Control-Allow-origin: *");
header("Content-Type:aplication/json");

include "../../config/Database.php";
include "../../models/Gategory.php";

//get database object
$database = new Database();
$dbh = $database->conect();

$category = new Category($dbh);
$stmt = $category->read();

//get how many row we have in the table
$num = $stmt->rowCount();

if ($num > 0) {
  $category_arr = [];
  $category_arr["data"] = [];

  //loop over each row in the table and push to the $category_arr[data]
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //extarct row data ($row["id"] ==>> $id)
    extract($row);

    $category_item = [
      "id" => $id,
      "name" => $name,
      "created_at" => $created_at
    ];

    //push category_item to the category['data']

    array_push($category_arr['data'], $category_item);
  }
  //add how many category we have in the database
  $category_arr["result_count"] = count($category_arr["data"]);
  //convert to json 
  echo json_encode($category_arr);
} else {
  echo json_encode(["message" => "no catagory found"]);
}
