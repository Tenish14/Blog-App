<nav class="flex items-center justify-between flex-wrap bg-teal-700 p-6">
	<div class="mr-6 text-white">
		<span class="font-semibold text-xl tracking-tight">R16 Blog</span>
	</div>
	<div class="block lg:hidden">
		<button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white" id="btn-menu">
		<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="https://www.w3.org/2000/svg">
		<title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
		</button>
	</div>
	<div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto" id="menu">
		<div class="text-sm lg:flex-grow">
			<a href="/index.php" class="block mt-4 lg:inline-block lg:mt-0 text-teal-300 hover:text-white mr-4">Home</a>
		<?php if(!isset($_SESSION['user'])): ?>
			<a href="/views/forms/login.php" class="block mt-4 lg:inline-block lg:mt-0 text-teal-300 hover:text-white mr-4">Login</a>
			<a href="/views/forms/register.php" class="block mt-4 lg:inline-block lg:mt-0 text-teal-300 hover:text-white mr-4">Register</a>
		<?php endif; ?>
		</div>
		<?php if(isset($_SESSION['user'])): ?>
		<div>
			<a href="/routes/logout.php" class="block mt-4 lg:inline-block lg:mt-0 text-teal-300 hover:text-white mr-4">Logout</a>
		</div>
	<?php endif; ?>
	</div>
</nav>