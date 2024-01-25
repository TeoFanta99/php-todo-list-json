<?php

	// lista delle cose da fare
	$list = [
		[
			'name' => 'Fare la spesa',
			'done' => false
		],
		[
			'name' => 'Andare in posta',
			'done' => false
		],
		[
			'name' => 'Aggiustare il rubinetto',
			'done' => false
		],
		[
			'name' => 'Studiare la lezione di oggi',
			'done' => false
		],
	];
	header ('Content-Type: application/json');
	header ("Access-Control-Allow-Origin: http://localhost:5173");

	echo json_encode($list);

?>
