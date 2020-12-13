<?php
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


$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;
$post->category_id = $data->category_id;
$post->id = $data->id;

if ($post->update()) {
  echo json_encode(["meessage" => "Post Updated"]);
} else {
  echo json_encode(["meessage" => "Post not Updated"]);
}
