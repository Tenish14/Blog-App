<?php 	
	require_once('./models/Post.php');
	require_once('./models/User.php');
	$title = "Home";
	function get_content(){
 ?>
<?php if(isset($_SESSION['user'])): ?>
 <div class="grid grid-cols-12">
 	<div class="col-start-4 col-span-6">
 		<form class="mt-6" action="/routes/add_posts.php" method="POST" enctype="multipart/form-data">
 			<div class="mb-4">
 				<label class="block font-black mb-2">Title</label>
 				<input type="text" name="title" class="shadow border rounded w-full py-2 px-3">
 			</div>
 			<div class="mb-4">
 				<label class="block font-black mb-2">Description</label>
 				<input type="text" name="description" class="shadow border rounded w-full py-2 px-3">
 			</div>
 			<div class="mb-4">
 				<label class="block font-black mb-2">Image</label>
 				<input type="file" name="image" class="shadow border rounded w-full py-2 px-3">
 			</div>
 			<button class="bg-teal-700 hover:bg-teal-600 text-white py-2 px-4 rounded border-b-4 border-teal-900">Submit</button>
 		</form>
 	</div>
 </div>
<?php endif; ?>

<div class="grid grid-cols-12">
	<?php foreach(Post::all() as $post): ?>
	<div class="col-start-4 col-span-6 mt-5">
		<div class="rounded shadow mb-5 flex">
			<img src="<?php echo $post->image; ?> "class="h-48" alt="Post Picture">
			<div class="px-6 py-6">
				<div class="font-bold text-xl mb-2 text-black-500"><?php echo $post->title; ?></div>
				<div class="text-gray-700"><?php echo $post->description; ?></div>
			<div class="flex items-center mt-4">
				<img src="<?php echo $post->author_image; ?>" alt="Profile Picture" class="mr-4 rounded-full w-16 h-16 border">
				<div class="text-sm">
					<p class="text-gray-900"><?php echo $post->author; ?></p>
					<p class="text-gray-900 "><?php echo $post->dataPosted ?></p>
				</div>
			</div>
		</div>
	</div>
</div>		

	<?php endforeach; ?>
</div>


 <?php } 
 	require 'views/layout.php';
 ?>