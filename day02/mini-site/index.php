<?php
error_reporting(E_ALL & ~E_NOTICE);
// what page are we on?
$the_page = $_GET['page'];
// sets default page to home
if($the_page == ''){
	$the_page = 'home';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Query String Navigation Demo Site</title>
	<link rel="stylesheet" type="text/css" href="reset.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="<?php echo $the_page; ?>">
	<div id="wrapper">
		<header>
			<h1>Mini Site!</h1>
			<nav>
				<ul>
					<li class="home"><a href="index.php?page=home">Home</span></a></li>
					<li class="gallery"><a href="index.php?page=gallery">Gallery</span></a></li>
					<li class="mystery"><a href="index.php?page=mystery">Mystery</span></a></li>
				</ul>
			</nav>
		</header>

		<main class="cf">
			<?php
			// swap out the content
			switch($_GET['page']){
				case 'home':
					include('content-home.php');
				break;

				case 'gallery':
					include('content-gallery.php');
				break;

				case 'mystery':
					include('content-mystery.php');
				break;

				default:
					include('content-home.php');
			}
			?>
		</main>

		<footer>
			<h3>&copy; 2016 by Me</h3>
		</footer>
	</div>
</body>
</html>