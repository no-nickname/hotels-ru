<?php
	require_once './libs/db.php';
	require_once './libs/utils.php';

	$result = query('SELECT * FROM comments');
	$messages = objects_array($result);	

	include './templates/header.php';
	include './templates/content.php';
	include './templates/footer.php';

?>