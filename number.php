<?php include 'head.php' ?>
<div id="number">
	<div class="header">
		<h2>You are playing Numbers</h2>
		<form>
			<input id="gues" type="text" name="gues">
			<input type="submit" name="submit" value="Gæt">
		</form>
	</div>
	<script>
		var x = 120;
		var y = document.getElementById("gues").value;
	</script>
</div>