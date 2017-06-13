<?php
/*Шаблон редактора 
================================
id_article-номер статьи
title-заголовок
content-содержание
comments-информация о комментариях
*/
?>
	<h3><?php echo $name?></h3>
	<p><?php echo nl2br($text)?></p>
	<br>
	<br>
	<div class="comments">
	<b>Комментарии:</b>
	<?php foreach ($comments as $comment): ?>
    	<div class="comment-<?php echo $comment['id']?>">
    	<hr>
    	<i><?php echo $comment['user_name']?></i><br>
		<p><?php echo $comment['comment']?></p> 	
    	</div>
    <?php endforeach ?>
    
	<br>
	<br>
	<hr>
	<b>Форма для добавления комментария:</b>
<form method="post">
	<input type="text" name="user_name" placeholder="Имя"><br>
	<textarea name="comment" placeholder="Текст комментария"></textarea><br>
	<input type="submit" name="add" value="Добавить">
</form>
</div>