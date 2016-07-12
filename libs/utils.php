<?php
	function post($param){
		return isset($_POST[$param]) ? $_POST[$param]:null;
	}
	function get($param){
		return isset($_GET[$param]) ? $_GET[$param]:null;
	}

	function clear_str($str){
		return trim(escape($str));
	}
	function full_clear_str($str){
		return strip_tags(clear_str($str));
	}

	function showComments() {
		$q = "SELECT * FROM comments WHERE parent_id IS NULL ORDER BY id DESC";  
		$r = query($q);  
		while($row = mysqli_fetch_assoc($r))
		{
			getComments($row); 
		}  
	}

	function getComments($row) {
		$level = $row['level'];
		?>

		<div class='message_container  col-xs-offset-<?=$level?>'>
		<div class='author'><?=$row['author']?></div>
		<div class='comment-body well well-lg'><?=$row['message']?></div>
		<div class='date'>Отправлено <?=date('d.m.Y в H:i',$row['time'])?></div>

		<?php
	 	if ($row['level'] < 5){
	 		echo "<a href='#' class='reply' id='".$row['id']."' data-level='".$level."'>Ответить</a>";
	 	}
	 	else {
	 		echo '';
	 	}
	 
		echo "<a href='' class='delete' id='".$row['id']."'>Удалить</a>";
		echo "</div>";

		$q = "SELECT * FROM comments WHERE parent_id = '{$row['id']}'";
		$r = query($q);
		if(mysqli_num_rows($r)>0)
	 	{
	  		while($row = mysqli_fetch_assoc($r)) {
	   			getComments($row);
	  		}
		}
	}

?>