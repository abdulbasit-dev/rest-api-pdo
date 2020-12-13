<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type:aplication/json");


include "../../config/Database.php";
include "../../models/Post.php";

$databse = new Database();
$dbh = $databse->conect();

$post = new Post($dbh);

$stmt = $post->read();


//return a non readable array that is default to read when calling this api
// $a = $stmt->fetchAll(PDO::FETCH_ASSOC);
// print_r($a);

//Get Row Count
$num = $stmt->rowCount();


//check if there is any post
if ($num > 0) {
  $post_arr = [];
  $post_arr["data"] = [];
  while ($row  = $stmt->fetch(PDO::FETCH_ASSOC)) {

    extract($row);
    // echo $title; //instead of $row["title"];
    $post_item = [
      "id" => $id,
      "title" => $title,
      "body" => html_entity_decode($body),
      "author" => $author,
      "category_id" => $category_id,
      "category_name" => $category_name,
      "created_at" => $created_at
    ];

    //push to data "data" array
    array_push($post_arr['data'], $post_item);
  }

  //add ho many item in the array
  $post_arr["result_count"] = count($post_arr["data"]);
  //convert to JSON format
  echo json_encode($post_arr);
  // print_r($post_arr);
} else {
  //No post
  echo json_encode(["message" => "no post found"]);
}
