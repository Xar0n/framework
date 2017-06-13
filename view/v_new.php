<?php /*
Шаблон создания новой статьи
============================
$title - заголовок
$content - содержание
$error - ошибка юзера
*/?>
	<h2>Новая статья</h2>
	<?php if ($error): ?>
		<b style="color:red">Заполните все поля!</b>
	<?php endif; ?>
	<form method="post">
		Название<sup style="color:red">*</sup>: <br>
		<input type="text" name="title" value="<?php echo $name?>">
		<br><br>
		Содержание: <br>
		<textarea name="content"><?php echo $text?></textarea>
		<br>
		<input type="submit" value="Добавить">
	</form>