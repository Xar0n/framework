<?php
class M_Article
{
	private static $instance;
    private $mysql;

	private function __construct(){
		$this->mysql = M_MYSQL::getInstance();
	}

	// получение единственного экземпляра класса
	public static function getInstance(){
		// гарантия одного экземпляра
		if (self::$instance === null) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	// список всех статей 
	public function articles_all(){
		// запрос
		$M_MYSQL=M_MYSQL::getInstance();
		$sql = 'SELECT * FROM `articles` ORDER BY id DESC';
		return $M_MYSQL->select($sql);
	}

	// получить конкретную статью 
	public function articles_get($id_article){
		$M_MYSQL=M_MYSQL::getInstance();
		$id=(int)$id_article;
		if(!$id){
	    return false;
		}
		$strSQL="SELECT * FROM `articles` WHERE `id` = '%d'";
		$query = sprintf($strSQL, $M_MYSQL->sql_escape($id)); 
	    return $M_MYSQL->select($query);
	}

	// добавить статью 
	public function articles_new($title, $content){
		$title = trim($title);
		$content = trim($content);
		if ($title == '') {
			return false;
		}
		$M_MYSQL=M_MYSQL::getInstance();
		$M_MYSQL->insert('lesson2', array('title' => $title, 'content' => $content));
		return true;
	}

	// изменить статью
	public function articles_edit($id_article, $title, $content){
		$id=(int)$id_article;
		if ($title == '' && !$id){
			return false;
	    }
	    $title = trim($title);
		$content = trim($content);
	    $M_MYSQL=M_MYSQL::getInstance();
 		$M_MYSQL->update('lesson2',array('title' => $title, 'content' => $content), "`id`=$id");
		return true;
	}

	// удаление статьи 
	public function articles_delete($id_article){
		$id=(int)$id_article;
		if(!$id){
			return false;
		}
		$M_MYSQL=M_MYSQL::getInstance();
		$M_MYSQL->delete('lesson2', "`id`=$id");
		return true;
	}

	// короткое описание статей 
	public function articles_intro(){
		$M_MYSQL=M_MYSQL::getInstance();
		$strSQL="SELECT `id`,`title`,`content`, SUBSTRING(`content`, 1, 10) FROM `articles`";
		return  $M_MYSQL->select($strSQL); 
	}
	//###############################################################################################################
	//                                  ТО ЧТО ПОКА НЕ ИСПОЛЬЗУЕТСЯ
	//###############################################################################################################
	public function articles_intro_php($article, $len = 500)//Не используется
	{
		return mb_substr($article, 0, $len);
	}

	public function articles_page_list($page){//Не используется
		$sql=sprintf('SELECT * FROM articles ORDER BY article_id DESC LIMIT %d, %s',($page-1)*APP,APP);
		$result=mysqli_query(getDbConnect(),$sql);
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
				if(mb_strlen($row['article_content'])>INTRO_SIZE){
					$row['article_content']=mb_strimwidth($row['article_content'],0,INTRO_SIZE);
					$row['readmore']=true;
				}
				else {
					$row['readmore']=false;
				}
				$articles[]=$row;
			}
		}
		else{
			$articles=array();
		}
		return $articles;
	}

	public function get_pages(){
		$sql=sprintf('SELECT count(*) FROM articles');
		$result=mysqli_query(getDbConnect(),$sql);
		$row=mysqli_fetch_row($result);																				
		$pages=ceil($row[0]/APP);
		return $pages;																								
	}
//################################################################################################################
}