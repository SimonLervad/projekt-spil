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
		<p id="antal" class="center"></p> <!-- Fortæller hvor mange liv der er tilbage-->
		<p id="antal2" class="center"></p>
	</div>

	<div id="alfabetet" class="center"> </div>


	<div id="won" class="center">
		<h3>Du vandt!</h3>
	<a href="" ><button id="start" type="button">Start nyt spil</button></a> <!-- starter nyt spil-->
	
			<form action="#"><br>
			    <input id="name" type="text" name="name" placeholder="Navn" minlength="2">
				<input id="time" type="text" name="time" value="" readonly><br>
				<input id="save" type="submit" name="submit" value="Gem din highscore">
			</form>
	</div>

	<div id="lose">
		<div class="center">
			<h3>Du tabte</h3><br>
	<a href="" ><button id="start" type="button">Start nyt spil</button></a> <!-- starter nyt spil-->
	</div>

</div>

</section>

<article>
	<h3>Highscore</h3>
	<p id="navn" class="center"></p>
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
	
	document.getElementById("antal").innerHTML = "😢";
	
	var liv = 0;
	function dead() {
		for (var i = 1; i < 11; i++) {
			if (i == 10) {
				document.getElementById("antal").innerHTML = "Du har tabt 😢";
			} else {
				document.getElementById("antal").innerHTML = 'Du har brugt ' + i + ' liv';
				liv += 1;
			}
		return liv;
		}
	}

	//press a key
	window.addEventListener("keydown", event => { 
		var letter = event.key; 

		/*
		let w = '';
		for (let i = 0; i < randomItem.length; i++) {
			if (gemmeord.charAt(i) !== '-') {
				w += gemmeord.charAt(i);
			} else if (randomItem.charAt(i) === letter) {
				w += letter;
			} else {
				w += '-';
			}
		}
	*/

	let w = '';
		for (let i = 0; i < randomItem.length; i++) {
			if (gemmeord.charAt(i) !== '-') {
				w += gemmeord.charAt(i);
				console.log('no1');
			} else if (randomItem.charAt(i) === letter) {
				w += letter;
				console.log('no2');
			} else {
				w += '-';
				console.log('no3');
			}
		}
		//dead() //død 
		//youWon() //Du vandt 

		document.getElementById("hiddenWord").innerHTML = w;
		gemmeord = w;
	  
	});


}//getNewWord





//Cookies
var score = 20;
var name = 'Tinna';
document.getElementById("navn").append($('name').value);
document.getElementById("score").append(readCookie(name)); //skriver highscore


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
	$("won").style.display = "block";
}
document.getElementById("won").append(youWon);

// Hvis man taber
function youLose(){
	$("lose").style.display = "block";
}
document.getElementById("lose").append(youLose);


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
