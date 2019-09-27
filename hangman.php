<?php include 'head.php' ?>

<div id="hangman">
	<section class="hangmanSec">

		<div class="hangmanHeader">
			<h2 class="center"> Du spiller hangman</h2>
			<p class="wordList center">?</button>
			<p class="what center">Gæt et ord vha. bogstaver. 
			Brug tasteturet til at indtaste et bogstav. 
			Passer bogstavet til det ordet, bliver det sat ind. <br>
			Passer bogstavet ikke, har du 10 forsøg til at gætte det, 
			ellers har du tabt. God fornøjelse <br>
			Det gælder om at få flest points<p>
		</div>

		<div class="center">
			<button id="start" type="button">Start nyt spil</button> <!-- starter nyt spil-->
			<p id="tema"></p> <!-- Fortæller hvor længden på ordet-->
			<p id="length"></p> <!-- Fortæller hvor længden på ordet-->
			<p id="hiddenWord"></p> <!-- Viser de ord, som bliver skrevet-->
			<p id="hiddenWordUnderline"></p> <!-- Viser _ under-->
			<p id="antal" class="center"></p> <!-- Fortæller hvor mange liv der er tilbage-->
			<p id="antal2" class="center"></p>
		</div>

		<div id="alfabetet" class="center"> </div>

		<div id="won" class="center">
			<h3>Du vandt!</h3>
			<a href="" ><button id="start" type="button">Start nyt spil</button></a> <!-- starter nyt spil-->
			<form action="#"><br>
				<input id="name" type="text" name="name" placeholder="Navn" minlength="2">
				<input id="highscore" type="number" name="highscore" value="" readonly><br>
				<input id="save" type="submit" name="submit" value="Gem din highscore">
			</form>
		</div>

		<div id="lose" class="center">
			<h3>Du tabte</h3><br>
			<a href="" ><button id="start" type="button">Start nyt spil</button></a> <!-- starter nyt spil-->
		</div>
	</section>

	<article>
		<h3>Highscore</h3>
		<p id="navn" class="center"></p>
		<p id="scores" class="center"></p>
	</article>

<script>
"use strict";
//nQuery, *the* JS Framework
var $ = function (foo) {
    return document.getElementById(foo);    // save keystrokes
}

const hangWord = ['pizza', 'snøfler', 'islagkage', 'chokoladekage', 'pandekage', 'falafel', 'sandwich', 'flæskesteg'];


//Antal forsøg tilbage
var liv = 10;
function dead() {
	liv -= 1;
	if (liv <= 0) {
		youLose();
	} else {
		document.getElementById("antal").innerHTML = 'Du har brugt ' + liv + ' liv';
	}
}

document.getElementById("start").addEventListener("click", getNewWord);
function getNewWord(){
	//Vælg et tilfældigt ord fra hangWord
	let randomItem = hangWord[Math.floor(Math.random()*hangWord.length)];
	let n = randomItem.length;
	document.getElementById("length").append('Ordet har ' + n + ' bogstaver');
	let gemmeord;

	//Udskriv hvor mange tegn der er på det tilfældige ord
	document.getElementById("hiddenWord").innerHTML = '';

	gemmeord = '';
	for (var i = 0; i < randomItem.length; i++) {
		//console.log(randomItem.charAt(i));
		document.getElementById("hiddenWord").innerHTML += '-';
		gemmeord += '-';
	}

	//Udskriver temaet, samt gør sådan at man ikke kan klikke på knappen
	document.getElementById("tema").append('Temaet er: mad');
	document.getElementById("start").removeEventListener('click', getNewWord);
	

	
	//Tryk på en knap og få funktionen til at virke
	document.addEventListener("keydown", function key(event) { 
		var letter = event.key; 

	let w = '';
	let success = false;
		if (randomItem === gemmeord){
			youWon(); //Du vandt 
			document.removeEventListener("keydown", key());
		} 
		for (let i = 0; i < randomItem.length; i++) {
			if (gemmeord.charAt(i) !== '-') {
				w += gemmeord.charAt(i);
			} else if (randomItem.charAt(i) === letter) {
				w += letter;
				success = true;
			} else {
				w += '-';
			}
		}
		if (! success) {
			dead() //død
		}
		document.getElementById("hiddenWord").innerHTML = w;
		gemmeord = w;
	});
}//getNewWord





//Cookies
document.getElementById("navn").append($('name').value);
//document.getElementById("score").append(score); //skriver highscore
document.getElementById("scores").append(document.cookie); //skriver highscore


const validate = function() {    	
	if ($('name').value.length < 2) {
		window.alert('ugyldigt navn');
		return false;
	}
	createCookie($('name').value, $('highscore').value, 7);
	return true;
}


const init = function() {
	console.log(document.cookie);
	$('save').addEventListener('click', validate);
}
window.addEventListener('load', init);




// Hvis man vinder
function youWon(){
	$("won").style.display = "block";
	$("start").style.display = "none";
	document.forms[0].highscore.value = liv;
	
}

// Hvis man taber
function youLose(){
	$("start").style.display = "none";
	$("lose").style.display = "block";
}


//Hvad er reglerne til hangman ?
var rules = document.getElementsByClassName("wordList");
var i;
for (i = 0; i < rules.length; i++) {
	rules[i].addEventListener("click", function() {
		this.classList.toggle("active");
		var what = this.nextElementSibling;
		if (what.style.display === "block") {
			what.style.display = "none";
		} else {
			what.style.display = "block";
		}
	});
}

</script>
