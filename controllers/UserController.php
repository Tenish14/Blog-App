<?php 
	session_start();
	require ('../models/User.php');

	class UserController extends User {
		public static function create($user) {
			

			if(strlen($user['username']) < 8 ){
				echo "Username should be more than 8 characters.";
			}
			else if(strlen($user['password']) < 8 || strlen($user['password2']) < 8){
				echo "Password should be more than 8 charcters.";
			}else if ($user['password'] != $user['password2']){
				echo "Password never matched.";
			}else if ($user['age'] < 16){
				echo "You should be more than 16 years old";
			}else if(User::check_user($user['username'])){
				echo "Username alrdy taken";
			}
			else {
				$user['password'] = sha1($user['password']);
				$new_user = new User($user);
				User::save($new_user);
				header('Location: /');
			}
		}

		public static function login($user) {
			$errors = 0;
			if(!User::check_user($user['username'])) {
				$errors++;
				echo "Username doesn't exist";
				return;
			}
		$user_details = User::find_user($user['username']);

		if($user_details->password != sha1($user['password'])){
			$errors++;
			echo "Check your cresentials";
			return;
		}

		if($errors == 0){
			$_SESSION['user'] = $user_details;
			unset($_SESSION['user']->password);
			// var_dump($_SESSION['user']);
			header('Location: /');
		}
	}

	public static function logout($user){
		//that will delete all session variables.
		session_unset();

		//destroy all data registered to a session
		session_destroy();

		header('location: /');

	}
}
 ?>