<?php

	require_once './libs/db.php';
	require_once './libs/utils.php';

	if (post('id') && post('id') !== null)
	{	
		$id = post('id');
		query("DELETE FROM comments WHERE id = {$id}"); 
		$is_error = false;
		$message = 'Комментарии успешно удалены.';
	}
	else 
	{
		$is_error = true;
		$message = 'Комментарии удалить не удалось.';
	}

	$response = [
		'is_error' => $is_error,
		'message' => $message
	];

	echo json_encode($response);
?>