	<script type='text/javascript'>
		$(function(){  
			$("a.reply").click(function() {  
				var id = $(this).attr("id");
				window.a = $(this).data('level');
				//window.a = level;

				$('.parent_id').attr("value", id); 
				$('#comment_body').focus();
				$('#comment_body').attr('placeholder', 'Введите ответ на комментарий...');
			});

			$(".send").click(function(){
				if (!$('#comment_name').val())
				{
					alert(' Введите имя');
				}
				else if (!$('#comment_body').val())
				{
					alert('Введите сообщение');
				}
					else
					{
						var comment_body = $('#comment_body').val();
						var comment_name = $('#comment_name').val();
						var parent_id = $('.parent_id').attr('value');
						var level = window.a;
						$.ajax({
							method: "POST",
							url: "add_comment.php",
							data: {
								comment_body: comment_body,
								comment_name: comment_name,
								parent_id: parent_id,
								level: level
							},
							dataType: 'json',

							success: function(response){
								window.location.reload(); 
							},

							error: function(response){
								alert(response['message']);
							}
						});
					}
			});  
		});
	</script>

	<script type='text/javascript'>
		$(function(){  
			$("a.delete").click(function() {  
				var id = $(this).attr("id");
				
				$.ajax({
					method: "POST",
					url: "del_comment.php",
					data: 'id=' + id,
					dataType: 'json',

					success: function(response){
						alert(response['message']);
						setTimeout(window.location.reload(), 500);
					},

					error: function(response){
						alert(response['message']);
					}
				});
			});  
		});
	</script>
</body>
</html>
