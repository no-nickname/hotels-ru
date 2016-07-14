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

	function showComments($messages) {
		
		foreach (array_reverse($messages) as $message)
		{
			if ($message->parent_id == null)
			{
				 getComments($messages, $message);
			}
		}
	}

	function getComments($messages, $row) {
		$level = $row->level;

		?>

		<div class='message_container  col-xs-offset-<?=$level?>'>
		<div class='author'><?=$row->author?></div>
		<div class='comment-body well well-lg'><?=$row->message?></div>
<?php
		print_r ($row->level);
		print_r ($row);
?>
		<div class='date'>Отправлено <?=date('d.m.Y в H:i',$row->time)?></div>

		<?php
	 	if ($row->level < 5){
	 		echo "<a href='#' class='reply' id='". $row->id ."' data-level='".$level."'>Ответить</a>";
	 	}
	 	else {
	 		echo '';
	 	}
	 
		echo "<a href='' class='delete' id='". $row->id ."'>Удалить</a>";
		echo "</div>";

		foreach ($messages as $message1)
		{
			if ($message1->parent_id == $row->id)
			{
				getComments($messages, $message1);
			}
			
		}
	}

?>