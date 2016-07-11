<div class="wrapper col-xs-10 col-xs-offset-1">

	<header>
		<h2>Тестовое задание.</h2>
	</header>

	<div class="container">
		<div class = "row">
			<div class="col-xs-6">
				<div id="comment_form"> 
					<div class="form-group"> 
						<label for="name">Ваше имя:</label>  
						<input type="text" name="name" id='comment_name' placeholder='Введите ваше имя...' class="form-control"/>
					</div>

					<div class="form-group"> 
						<label for="comment_body">Ваше сообщение:</label>  
						<textarea wrap= "hard" cols ="20" id='comment_body'  placeholder='Введите ваше сообщение...' class="form-control" rows="5"></textarea> 
					</div> 

					<input type='hidden' class='parent_id' name='parent_id' value='0'/>  
					<input type='hidden' class='level' name='level' value='<?= 'test'?>'/>  
					<br>
					<div id='submit_button'>
						<button value="Add comment" class="send btn btn-primary">Отправить</button> 
					</div>  
				</div> <!-- #comment_form -->
			</div> <!-- .col-xs-5 -->
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
			
			<?php
				showComments();
			?>
			<?
				if(count($messages)<=0){
					?>
					<p style="color:lightblue">Сообщений пока нет.</p>
					<?
				}
			?>
			</div>
		</div> <!-- .row -->
	</div>

</div> <!-- .wrapper -->

<footer>
</footer>