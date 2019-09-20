<?php include 'head.php' ?>

<div id="hangman">
	<div class="header">
		<h2>You are playing Hangman</h2>
		<p>Indtast et bogstav og se om du kan løse ordet inden 8 forsøg<p>
		<button id="start" onclick="getNewWord()" type="button">Start nyt spil</button>
		<p id="length"></p>
	</div>
	<div>
		<p id="wordList" onclick="addWord()">?</p>



	</div>

</div>

<script>

const hangWord = ['svømmehal', 'dronning', 'dannebrog', 'chokoladekage', 'Marathon']

//Tilføj nye ord til hangWord, aktiv ved klip på ?
function addWord() {
	hangWord.push((prompt('Tilføj nyt ord til listen')));
	document.getElementById("wordList").innerHTML = hangWord;
};

//Vælg et tilfældigt ord fra hangWord og udskriv hvor mange tegn
function getNewWord(){
	let randomItem = hangWord[Math.floor(Math.random()*hangWord.length)];
	let n = randomItem.length;
	let i = 0;
	while ( i < n ) {
		let res = n.charAt(1);
	}
	document.getElementById("length").innerHTML = res;
}















</script>
