<?php include 'head.php' ?>
<div id="number">
	<div class="header">
		<h2>Number games</h2>
			<input id="gues" type="number" name="number">
			<button id="knap">Gæt</button>
			<p id="demo"></p>
			<div id="warning">
				<p>
					tal under 1 og over 1000 er ikke accepteret!
				</p>
				<button onclick="warning()">
					Forstået
				</button>
			</div>
			<a id="dead" href=""></a>
			<div id="winner">
				<h2>Tillykke</h2><br>
				<p>
					Du har gættet det rigtige tal!
					<br>
					Indtast dit navn og gem din highscore. Udfordrer dine venner og se om de kan slå den
				</p><br>
				<div class="flex">
				<a href="">Prøv igen!</a>
				<a href="index.php">Tilbage til forsiden</a>					
				</div>
			</div>
	</div>
</div>
<script>
	const $ = function(foo) {
    	return document.getElementById(foo);    
	}
	var i = 1;
	const gues = function() {
		if (i === 10) {
			$("dead").innerHTML = "Du har tabt <br> spil igen";
			$("dead").style.display = "flex";
		} else if (i < 10) {
			i++;
		}	
	}
	const warning = function() {
		$("warning").style.display = "none";
		if (i === 10) {
			$("dead").style.display = "none";
		} else {
			i = i - 1;
		}

	}
	const x = Math.floor(Math.random() * 1000 + 1);
	const validate = function() {
		if ($("gues").value < 1) {
    		$("warning").style.display = "flex";
    	} else if ($("gues").value > 1000) {
    		$("warning").style.display = "flex";
    	} else if ($("gues").value < x) {
    		$("demo").innerHTML = $("gues").value + " er for lavt";
    	} else if ($("gues").value > x) {
    		$("demo").innerHTML = $("gues").value + " er for højt";
    	} else if ($("gues").value === x) {
			$("winner").style.display = "block";
    	}
	}
	const init = function() {
		$("knap").addEventListener('click', validate);	
		$("knap").addEventListener('click', gues);	
}
	window.addEventListener('load', init);
</script>
</body>
</html>