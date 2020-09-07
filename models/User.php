<?php 
require_once($_SERVER['DOCUMENT_ROOT']. '../interfaces/Database.php');
require_once('Model.php');

class User extends Model implements JsonSerializable, Database{
	private $firstname;
	private $lastname;
	private $username;
	private $age;
	private $image;
	private $password;

	

	public function __construct($user) {
		$image_name = $_FILES['image']['name'];
		$image_size = $_FILES['image']['size'];	
		$image_tmpname = $_FILES['image']['tmp_name'];	
		move_uploaded_file($image_tmpname, '../assets/img/user/'.$image_name);

		$this->firstname = $user['firstname'];
		$this->lastname = $user['lastname'];
		$this->username = $user['username'];
		$this->age = $user['age'];
		$this->image = "../assets/img/user/".$image_name;
		$this->password = sha1($user['password']);
		$this->password = sha1($user['password2']);
	}
	public function jsonSerialize () {
		return get_object_vars($this);
	}

	public static function check_user($username){
		$all_users = Model::get_db('../assets/db/users.json');
		$exist = false;
		foreach($all_users as $user) {
			if($username == ($user->username)){
				$exist = true;
			}
		}return $exist;
	}

	public static function find_user($username) {
		$all_users = Model::get_db('../assets/db/users.json');
		foreach ($all_users as $user) {
			if($username == $user->username){
				return $user;
			}
		}
		echo "User does not exist";
	}

}

 ?>