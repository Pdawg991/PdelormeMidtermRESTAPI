<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/database.php';
include_once '../../models/Quote.php';

$database = new Database();
$db = $database->connect();

$post = new Quote($db);

$data = json_decode(file_get_contents("php://input"));
//Set ID to update
$post->id = $data->id;
$post->quote = $data->quote;

if ($post->update()){
    echo json_encode(array('message'=> 'Post Updated'));
}
else {
    echo json_encode(array('message' => 'Post Not Updated'));
}