<?php
include "./config/Database.php";

$database = new Database();
$database->conect();

echo "index page";
