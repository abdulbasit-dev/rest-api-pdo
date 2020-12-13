<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type:aplication/json");


include "../../config/Database.php";
include "../../models/Post.php";

$database = new Database();
$dbh = $database->conect();

$post = new Post($dbh);

//Get ID
$post->id = isset($_GET["id"]) ? $_GET["id"] : die();
// echo $post->id;

//Get Post
$post->getSinglePost();

//create array
$post_arr = [
  "id" => $post->id,
  "title" => $post->title,
  "body" => html_entity_decode($post->body),
  "author" => $post->author,
  "category_id" => $post->category_id,
  "category_name" => $post->category_name,
  "created_at" => $post->created_at
];

//convert to JSON
echo json_encode($post_arr);
