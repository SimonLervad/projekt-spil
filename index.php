<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Spil portalen</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<h1>Spilportalen</h1>
	</header>
	<div id="forside">
		<div class="header">
			<h2>Velkommen til spilportalen</h2>
			<br>
			<p>
				Vælg mellem tre spil fra vores bibliotek her! 
			</p>
		</div>
		<div class="spil">
			<button onclick="yatzy()">Yatzy</button>
			<button onclick="hangman()">Hangman</button>
			<button onclick="number()">Number 1 - 1000</button>
		</div>
	</div>
	<?php include 'number.php' ?>
		<?php include 'yatzy.php' ?>
			<?php include 'hangman.php' ?>
	<script>
		function yatzy() {
			document.getElementById("forside").style.display = "none";
			document.getElementById("yatzy").style.display = "block";
		}
		function hangman() {
			document.getElementById("forside").style.display = "none";
			document.getElementById("hangman").style.display = "block";
		}
		function number() {
			document.getElementById("forside").style.display = "none";
			document.getElementById("number").style.display = "block";
		}
	</script>
</body>
</html>