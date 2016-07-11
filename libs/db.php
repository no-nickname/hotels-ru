<?php
	$conn=mysqli_connect('localhost', 'root', '', 'hotels') or die('Ошибка подключения к базе данных');

	function query($sql){
		global $conn;
		$result=mysqli_query($conn,$sql) or die('Ошибка выполнения запроса:' . mysqli_error($conn));
		return $result;
	}

	function objects_array($result){
		$arr=[];
		while($row=mysqli_fetch_object($result)){
			$arr[]=$row;
		}
		return $arr;
	}
	
	function object($result){
		return mysqli_fetch_object($result);
	}

	function escape($str){
		global $conn;
		return mysqli_real_escape_string($conn,$str);
	}
?>
