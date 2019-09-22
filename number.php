<?php include 'head.php' ?>
<div id="number">
	<div class="header">
		<h2>Number games</h2>
			<input id="gues" type="number" name="number">
			<button id="knap">Gæt</button>
			<p id="demo"></p>
			<a id="dead" href=""></a>
	</div>
</div>
<script>
	var i = 1;
	const gues = function() {
		if (i === 10) {
			document.getElementById("dead").innerHTML = "Du har tabt <br> spil igen";
			document.getElementById("dead").style.display = "flex";
		} else if (i < 10) {
			i++;
		}
	}
	const x = Math.floor(Math.random() * 1000);
	const $ = function(foo) {
    	return document.getElementById(foo);    
	}
	const validate = function() {    	
    	if ($("gues").value < x) {
    		document.getElementById("demo").innerHTML = $("gues").value + " er for lavt";
    	} else if ($("gues").value > x) {
    		document.getElementById("demo").innerHTML = $("gues").value + " er for højt";
    	} else {
    		window.alert("Korrekt" + "<a href=''>play again</a>")
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