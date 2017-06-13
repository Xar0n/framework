<?php
//
//Контролер для взаимодействия со статьями
//
class C_Editor extends C_Base 
{	
//###########################################################################################
public function action_new(){ //Создание новой статьи //GOOD
	$this->title .= '::Создание новой статьи';
	$M_Article=M_Article::getInstance();
	$name = '';
	$text = '';
	$error = false;
	if ($this->isPost() && isset($_POST['title']) && isset($_POST['content'])) {
	if ($M_Article->articles_new($_POST['title'], $_POST['content'])) {
		die(header('Location: index.php?c=editor&act=editor'));
	}
	//Переменные для запоминания введённых значений в форму
	$title = $_POST['title'];  
	$content = $_POST['content'];
	$error = true;
	}
	$this->content = $this->Template('view/v_new.php', array('name' => $name, 'text' => $text, 'error' => $error));
 }
//############################################################################################
public function action_editor(){ //Консоль редактора//GOOD 
	$this->title .= '::Консоль редактора';
	$M_Article=M_Article::getInstance();
	if($this->isPost()){
	if(isset($_POST['delete'])){
    	$M_Article->articles_delete($_POST['id_article']);
    	header('Location:index.php?c=editor&act=editor');
        die();
	}
	if(isset($_POST['edit'])){
       header("Location:index.php?c=editor&act=edit&id={$_POST['id_article']}");
       die();
	}
	}
	$articles = $M_Article->articles_all();
	$this->content = $this->Template('view/v_editor.php', array('articles'=>$articles));	 
}
//############################################################################################
public function action_edit(){ //Редактирование статьи
	$M_Article=M_Article::getInstance();
	if(isset($_GET['id']) && (int)$_GET['id'] && $M_Article->articles_get($_GET['id'])){
	//Для вывода
	$this->title .= '::Редактирование статьи';
	$id=$_GET['id'];
	$info=array();
	$info=$M_Article->articles_get($id);
	$name=$info[0]['title'];
	$text=$info[0]['content'];
	//Обработка данных
	if(isset($_POST['save']) && isset($_POST['title']) && isset($_POST['content']))
	{
	$id_article=(int)$_GET['id'];
	$title_article=$_POST['title'];
	$content_article=$_POST['content'];
	$M_Article->articles_edit($id_article, $title_article, $content_article);
	header("Location:index.php?c=article&act=article&id={$id_article}");
	die();
	}
	$this->content = $this->Template('view/v_edit.php', array('name' => $name,'text' => $text));	
	}
	else {
    $error="Ошибка 404!";
    $this->content = $this->Template('view/v_error.php', array('error' => $error));
	}	
}
//############################################################################################
}
?>