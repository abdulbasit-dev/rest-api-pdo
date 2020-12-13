<?php

//Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type:aplication/json");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With");


include "../../config/Database.php";
include "../../models/Post.php";

$database = new Database();
$dbh = $database->conect();

$post = new Post($dbh);

//Get Raw posted data
$data = json_decode(file_get_contents("php://input"));

//Set id to delere
$post->id = $data->id;

if ($post->delete()) {
  echo json_encode(["meessage" => "Post Deleted"]);
} else {
  echo json_encode(["meessage" => "Post not Deleted"]);
}
