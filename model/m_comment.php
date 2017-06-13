<?php
class M_Comment
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

    //добаление комментария
	public function comment_add($id_article, $name_user,  $comment){
		$id=(int)$id_article;
		if ($name_user === '' || !$id) {
			return false;
		}
		$name_user = trim($name_user);
		$comment = trim($comment);
		$M_MYSQL=M_MYSQL::getInstance();
        $M_MYSQL->insert('comments', array('id_article'=>$id, 'user_name' => $name_user, 'comment' => $comment));
		return true;
	}
    
    //получение комментариев
	public function comment_get($id_article){
		$M_MYSQL=M_MYSQL::getInstance();
		$strSQL="SELECT * FROM `comments` WHERE `id_article` = '%d'";
		$query = sprintf($strSQL, $M_MYSQL->sql_escape($id_article));
		return $M_MYSQL->select($query);
	}

    //удаление комментария
	public function comment_delete($id_comment){
		$id=(int)$id_comment;
		if(!$id){
			return false;
		}
		$M_MYSQL=M_MYSQL::getInstance();
		$M_MYSQL->delete('comments', "`id`=$id");
		return true;
	}
    
    //редактирование комментария
	public function comment_edit($id_comment, $name_user, $comment){
		$M_MYSQL=M_MYSQL::getInstance();
		return true;
	}
}