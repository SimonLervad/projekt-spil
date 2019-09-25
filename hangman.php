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
		Det gælder om at få færrest points<p>
	</div>
	
	<div class="center">
		<button id="start" type="button">Start nyt spil</button> <!-- starter nyt spil-->
		<p id="tema"></p> <!-- Fortæller hvor længden på ordet-->
		<p id="length"></p> <!-- Fortæller hvor længden på ordet-->
		<p id="hiddenWord"></p> <!-- Viser de ord, som bliver skrevet-->
		<p id="hiddenWordUnderline"></p> <!-- Viser _ under-->
		<br>
		<p id="antal" class="center"></p> <!-- Fortæller hvor mange liv der er tilbage-->
		<p id="antal2" class="center"></p>
	</div>

	<div id="alfabetet" class="center"> </div>


	<div id="won">
			<form action="#">
			    <input id="name" type="text" name="name" placeholder="Navn" minlength="2">
				<input id="time" type="text" name="time" value="" readonly>
				<input id="save" type="submit" name="submit" value="Gem din highscore">
			</form>
	</div>

</section>

<article>
	<h3>Highscore</h3>
	<p id="name" class="center"></p>
	<p id="score" class="center"></p>
</article>

<script>
"use strict";
//nQuery, *the* JS Framework
var $ = function (foo) {
    return document.getElementById(foo);    // save keystrokes
}

const hangWord = ['pizza', 'snøfler', 'islagkage', 'chokoladekage', 'pandekage', 'falafel', 'sandwich', 'chips', 'flæskesteg'];

//Vælg et tilfældigt ord fra hangWord
document.getElementById("start").addEventListener("click", getNewWord);

function getNewWord(){
	//Vælger et tilfældigt ord
	let randomItem = hangWord[Math.floor(Math.random()*hangWord.length)];
	let n = randomItem.length;
	document.getElementById("length").append('Ordet har ' + n + ' bogstaver');
	let gemmeord;

	//Udskriv hvor mange tegn der er på det tilfældige ord
	document.getElementById("hiddenWord").innerHTML = '';

	gemmeord = '';
	for (var i = 0; i < randomItem.length; i++) {
		console.log(randomItem.charAt(i));
		document.getElementById("hiddenWord").innerHTML += '-';
		gemmeord += '-';
		//skal kobles til bogstaverne , så når man taster dem på tastaturet så erstatter de underline - Tinna
	}

	//Udskriver temaet, samt gør sådan at man ikke kan klikke på knappen
	document.getElementById("tema").append('Temaet er: mad & snacks');
	document.getElementById("start").removeEventListener('click', getNewWord);

	//Antal forsøg tilbage
	
	$("antal").innerHTML = " ";
	var p = 0;
	const guess = function() {
		if (p == 10) {
			$("antal").innerHTML = "Du har tabt 😢 <br> spil igen";
		} else if (p < 10) {
			p++;
			$("antal").innerHTML = 'Du har brugt ' + p + ' forsøg';
		}	
	}

	


	//press a key
	window.addEventListener("keydown", event => { 
		var letter = event.key; 

		let w = '';
		for (let i = 0; i < randomItem.length; i++) {
			if (gemmeord.charAt(i) !== '-') {
				w += gemmeord.charAt(i);
			} else if (randomItem.charAt(i) === letter) {
				w += letter;
			} else if (randomItem.charAt(i) === gemmeord.charAt(i)){
				youWon();
			} else {
				w += '-';
				guess();
			}
		}
		document.getElementById("hiddenWord").innerHTML = w;
		gemmeord = w;
	  
	});


}//getNewWord




//Cookies
var score = 30;
document.getElementById("score").append(score); //skriver highscore

const validate = function() {    	
	if ($('name').value.length < 2) {
		window.alert('ugyldigt navn');
		return false;
	}
	createCookie($('name').value, score, 7);
	return true;
}

const init = function() {
	console.log(document.cookie);
	$('save').addEventListener('click', validate);
}
window.addEventListener('load', init);

// Hvis man vinder
function youWon(){
	document.getElementById("won").style.display = "block";
}
document.getElementById("won").append(youWon);

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
