<?php include 'head.php' ?>

<div id="hangman">
	<div class="header">
		<h2>You are playing Hangman</h2>
		<p>Indtast et bogstav og se om du kan løse ordet inden 8 forsøg<p>
	</div>
	<div class="center">
		<button id="start" onclick="getNewWord()" type="button">Start nyt spil</button>
		<button id="ned" onclick="antalFors()" type="button">nedtæller</button>
		<p id="length"></p>
		<p id="hiddenWord"></p>
		<p id="hiddenWordUnderline"></p>
	</div>

	<div class="center">
		<p>Antal forsøg tilbage:</p>
		<p id="antalfor">8</p>
	<div class="center">
		<p id="wordList" onclick="addWord()">?</p>
	</div>
	<div id="alfabetet">
		<p>A</p>
		<p>B</p>
	  <p>C</p>
		<p>D</p>
		<p>E</p>
		<p>F</p>
		<p>G</p>
		<p>H</p>
		<p>I</p>
		<p>J</p>
		<p>K</p>
		<p>L</p>
		<p>M</p>
		<p>N</p>
		<p>O</p>
		<p>P</p>
		<p>Q</p>
		<p>R</p>
		<p>S</p>
		<p>T</p>
		<p>S</p>
		<p>U</p>
		<p>V</p>
		<p>W</p>
		<p>X</p>
		<p>Y</p>
		<p>Z</p>
		<p>Æ</p>
		<p>Ø</p>
	</div>

</div>
<style>
.center {
	text-align: center;
}
#alfabetet {
	display: flex;
	justify-content: space-around;
}
#wordList {
	opacity: .1;
}


</style>

<script>

/**
 * nQuery, *the* JS Framework
 */
var $ = function (foo) {
    return document.getElementById(foo);    // save keystrokes
}


const hangWord = ['svømmehal', 'dronning', 'dannebrog', 'chokoladekage', 'marathon'];

//Tilføj nye ord til hangWord, aktiv ved klip på ?
function addWord() {
	hangWord.push((prompt('Tilføj nyt ord til listen')));
	document.getElementById("wordList").innerHTML = hangWord;
};

//Vælg et tilfældigt ord fra hangWord
function getNewWord(){
	let randomItem = hangWord[Math.floor(Math.random()*hangWord.length)];
	let n = randomItem.length;

	document.getElementById("length").innerHTML = n;

//Udskriv hvor mange tegn der er på det tilfældige ord
for (var i = 0; i < randomItem.length; i++) {

	console.log(randomItem.charAt(i));
	document.getElementById("hiddenWord").innerHTML = (randomItem.charAt(i));
	document.getElementById("hiddenWordUnderline").innerHTML = '_';
}
}


//Antal forsøg tilbage
let fors = 8;
function antalFors(){
		if (fors > 1) {
			fors -= 1;
			return fors;
		}
		else {
			return 'ikke flere forsøg, spillet er tabt';
		}
}
//Aktiveres ved tryk på knappen med id ned
document.getElementById("ned").addEventListener("click", function(){
document.getElementById("antalfor").innerHTML = antalFors();
});


console.log(antalFors());
console.log(antalFors());
console.log(antalFors());
console.log(antalFors());
console.log(antalFors());
console.log(antalFors());
console.log(antalFors());
console.log(antalFors());



</script>
