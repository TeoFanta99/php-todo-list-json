<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Headers: X-Requested-With");
header("Access-Control-Allow-Origin: http://localhost:5173");

// recupero l'index dal file js
$index = $_GET['index'];

// recupero i contenuti del file list.json
$jsonPosts = file_get_contents("list.json");

// decodifico il file (lo traduco in un linguaggio comprensibile a php)
$posts = json_decode($jsonPosts, true);

// funzione per rimuovere il post dell'indice corrispondente. Il numero 1 è la quantità di elementi da rimuovere
array_splice($posts, $index, 1);


// codifico il file (lo traduco in un linguaggio comprensibile a js)
$jsonPosts = json_encode($posts);

// inserisco i nuovi contenuti all'interno del file json
file_put_contents("list.json", $jsonPosts);

// confermo e invio
echo $jsonPosts;


?>