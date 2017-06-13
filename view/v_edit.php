<?php/*
Шаблон редактирования статьи
id_article-номер статьи
title-заголовок
content-содержание
*/
?>
	<form method="post" name="edit">
		<input type="text" name="title" value="<?php echo htmlspecialchars($name);?>"><br>
		<textarea name="content"><?php echo htmlspecialchars($text);?></textarea><br>
		<input type="submit" name="save" value="Сохранить">
	</form>