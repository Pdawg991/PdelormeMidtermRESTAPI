<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/database.php';
include_once '../../models/Category.php';

$database = new Database();
$db = $database->connect();

$post = new Category($db);

$data = json_decode(file_get_contents("php://input"));
$post->id = $data->id;
$post->category = $data->category;

if ($post->create()){
    echo json_encode(array('id' => $post->id,'category'=> $post->category));
}
else {
    echo json_encode(array('message' => 'Post Not Created'));
}