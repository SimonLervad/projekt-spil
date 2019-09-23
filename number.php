<?php include 'head.php' ?>
<div id="number">
	<div class="header">
		<h2>Number games</h2>
			<input id="gues" type="number" name="number">
			<button id="knap">Gæt</button>
			<div id="rules">
				<h2>Numbers 1 - 1000</h2>
				<div class="flex">
					<div class="row">
						<h3>Regler</h3><br>
						<p>
							1. Du har 10 forsøg til at gætte et tilfældigt tal mellem 1 - 1000<br>
							2. Du må ikke gætte på tal over 1000, eller under 0<br>
							3. Hvis du gætter forkert 10 gange, taber du<br>
							4. Hvis du gætter det tilfældige tal, vinder du<br>
							5. Når du trykker start, vil en timer starte og måle hvor hurtigt du kan gætte tallet<br><br>
							Prøv igen og se om du kan slå din egen rekord!
						</p>
					</div>
					<div id="score" class="row">
						<h3>Highscore</h3>
						<p id="highsscores">
							
						</p>
					</div>
				</div>
				<div class="buttons">
		            <button id="startStop" onclick="startStop()">Start</button>
		        </div>
			</div>
			<p id="demo"></p>
			<div class="container">
		        <div id="display">
		            00:00:00
		        </div>
		    </div>
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
		        <p id="answer">
		        	
		        </p><br>
		        <form action="#">
			        <input id="name" type="text" name="name" placeholder="Name" minlength="2">
					<input id="time" type="text" name="time" value="" readonly>
					<input id="save" type="submit" name="submit" value="Gem din tid">
				</form>
				<br><p>
					Du har gættet det rigtige tal
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
let milli = 0;
let seconds = 0;
let minutes = 0;

let displayMilli = 0;
let displaySeconds = 0;
let displayMinutes = 0;

let interval = null;

let status = "stopped";

stopWatch = function() {
    milli++;
    if (milli / 100 === 1) {
        milli = 0;
        seconds++;
        if (seconds / 60 === 1) {
            seconds = 0;
            minutes++;
        }
    }
    if(milli < 10) {
        displayMilli = "0" + milli.toString();
    } else {
        displayMilli = milli;
    }
    if(seconds < 10) {
        displaySeconds = "0" + seconds.toString();
    } else {
        displaySeconds = seconds;
    }
    if (minutes < 10) {
        displayMinutes = "0" + minutes.toString();
    } else {
        displayMinutes = minutes;
    }
    $("display").innerHTML = displayMinutes + ":" + displaySeconds + ":" + displayMilli;
}
startStop = function() {

    if (status === "stopped") {
        interval = window.setInterval(stopWatch, 10);
        status = "started";
        $("rules").style.display = "none";
    } else {
        window.clearInterval(interval);
        status = "stopped";
    }
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
    	} else if ($("gues").value = x) {
			$("winner").style.display = "block";
			document.forms[0].time.value = displayMinutes + ":" + displaySeconds + ":" + displayMilli;
			$("answer").innerHTML = "Svar: " + x;
    	}
	};
	const save = function() {    	
    	if ($('name').value.length < 2) {
    		window.alert('ugyldigt navn');
			return false;
		}
		createCookie($('name').value, $('time').value, 0.0034222);
		return true;
	}
	const init = function() {
		$("knap").addEventListener('click', validate);	
		$("knap").addEventListener('click', gues);
		$('save').addEventListener('click', save);
		
	}
	window.addEventListener('load', init);
</script>
</body>
</html>