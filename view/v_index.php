<?php
/*Шаблон главной страницы 
================================
$articles - список статей
id - идентифицатор
title - заголовок
content - текст
*/
?>
 
    <?php foreach ($articles as $article): ?>
    	<div class=<?php echo $article['id'];?>>
			<h4><a href="index.php?c=article&act=article&id=<?php echo $article['id'];?>"><?php echo $article['title'];?></a></h4>
			<p><?php echo nl2br($article['SUBSTRING(`content`, 1, 10)'])."....";?></p>
			<hr>
	    </div>
    <?php endforeach ?>