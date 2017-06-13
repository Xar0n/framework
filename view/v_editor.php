<?php /*
Шаблон редактируемой страницы
==============================
$articles - список статей
id_article - идентифицатор
title - заголовок
content - текст
*/
//<a href="index.php?c=article&act=edit&id=<?php echo $article['id'];
?>
	
		    <b><a href="index.php?c=editor&act=new">Новая статья</a></b></li>
			<table border="1">
			<tr>
			<td>Номер</td>
			<td>Название</td>
			<td colspan="2">Действия со статьей</td>
			</tr>
			<?php foreach ($articles as $article): ?>
			<tr>
			<form method="post">
			<td><?php echo $article['id'];?></td>
			<td><a href="index.php?c=article&act=article&id=<?php echo $article['id'];?>"><?php 
				echo $article['title'] ?></a></td>
			<td><input type="hidden" name="id_article" value="<?php echo $article['id'];?>">
			<input type="submit" name="edit" value="Редактировать">
			</td>
			<td><input type="hidden" name="id_article" value="<?php echo $article['id'];?>">
			<input type="submit" name="delete" value="Удалить">
			</td>
			</form>
			</tr>
			<?php endforeach ?>
			</table> 
			
			
	