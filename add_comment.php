<?php
	require_once './libs/db.php';
	require_once './libs/utils.php';

	if (post('comment_body') && post('comment_body') !== null)
	{	
		$body = clear_str(nl2br(post('comment_body')));
		$name = full_clear_str(post('comment_name'));

		$date = time();
		$level = post('level');
		$parent_id = intval(post('parent_id'));
		if ($parent_id != 0)
		{
			$level = $level + 1;
			query("INSERT INTO `comments` (`parent_id`, `message`, `author`, `time`, `level`) VALUES ('{$parent_id}', '{$body}', '{$name}', '{$date}', '{$level}');"); 
		}
		else
		{
			query("INSERT INTO `comments` (`parent_id`, `message`, `author`, `time`, `level`) VALUES (NULL, '{$body}', '{$name}', '{$date}', '0');"); 
		}

		$is_error = false;
		$message = 'Комментарий успешно добавлен.';
	}
	else 
	{
		$is_error = true;
		$message = 'Не удалось добавить комментарий.';
	}

	$response = [
		'is_error' => $is_error,
		'message' => $message,
	];

	echo json_encode($response);
?>