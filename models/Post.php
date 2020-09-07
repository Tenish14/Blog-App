<?php 
session_start();
require_once($_SERVER['DOCUMENT_ROOT']. '../interfaces/Database.php');
require_once('Model.php');

class Post extends Model implements JsonSerializable, Database{
	private $title;
	private $description;
	private $image;
	
	public function __construct($post) {
		$image_name = $_FILES['image']['name'];
		$image_size = $_FILES['image']['size'];	
		$image_tmpname = $_FILES['image']['tmp_name'];	
		move_uploaded_file($image_tmpname, '../assets/img/posts/'.$image_name);
		
		$this->title = $post['title'];
		$this->description = $post['description'];	
		$this->image = "../assets/img/posts/".$image_name;
		$this->author = $_SESSION['user']->username;
		$this->author_image = $_SESSION['user']->image;
		$this->dataPosted = date("Y-m-d h:i:sa");
	}
	public function JsonSerialize() {
		return get_object_vars($this);
	}

	public function all(){
		$posts = Model::get_db($_SERVER['DOCUMENT_ROOT']. '../assets/db/posts.json');
		return $posts;
	}
}
 ?>