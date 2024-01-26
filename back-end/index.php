<?php

header ('Content-Type: application/json');
header("Access-Control-Allow-Headers: X-Requested-With");
header ("Access-Control-Allow-Origin: http://localhost:5173");

	// recupero i contenuti del file json
	$jsonPosts = file_get_contents("list.json");
	echo $jsonPosts;

?>
