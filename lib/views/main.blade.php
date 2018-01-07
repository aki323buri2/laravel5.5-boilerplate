<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>main</title>
	<link rel="stylesheet" href="{{ url('/css/main.css') }}">
</head>
<body>
	<nav class="navbar is-light">
		<div class="container">
			<div class="navbar-brand">
				<a class="navbar-item">
					<span class="icon"><i class="material-icons">face</i></span>
					<span>main</span>
				</a>
				<div class="navbar-burger">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<div class="navbar-menu">
				<div class="navbar-start">
					<a class="navbar-item">
						<span class="icon"><i class="material-icons">library_books</i></span>
						<span>Docs</span>
					</a>
				</div>
				<div class="navbar-end">
					<div class="navbar-item">
						<a class="button is-info">
							<span class="icon"><i class="fab fa-twitter"></i></span>
							<span>Tweet</span>
						</a>
						<a class="button is-dark">
							<span class="icon"><i class="fab fa-github"></i></span>
							<span>GitHub</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<div class="container">
		<div>&nbsp;</div>
		<div id="err"></div>
		<div id="app"></div>
	</div>
	<script>
	(function ()
	{
		var burger = document.querySelector('.navbar-burger');
		var menu = document.querySelector('.navbar-menu');
		burger.addEventListener('click', function (e)
		{
			burger.classList.toggle('is-active');
			menu.classList.toggle('is-active');
		});
	})();
	</script>
	<script src="{{ url('/js/main.js') }}"></script>
</body>
</html>