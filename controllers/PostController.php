<?php 

	require("../models/Post.php");

	class PostController extends Post
	{
		public static function create($post) {
			$new_posts = new Post ($post);
			$new_posts->save($new_posts);
			header('Location: /');		
		}

	}
 ?>