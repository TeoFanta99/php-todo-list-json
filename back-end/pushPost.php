<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// ottengo gli elementi dal file json
$jsonPosts = file_get_contents("list.json");

// decodifico il file in linguaggio php
$posts = json_decode($jsonPosts, true);

$text = $_POST['text'];
$newPost = [
    'name' => $text,
    'done' => false,
];

$posts[] = $newPost;

$jsonPosts = json_encode($posts);
file_put_contents("list.json", $jsonPosts);

echo $jsonPosts;

?>