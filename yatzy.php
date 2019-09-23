<?php include 'head.php'?>


<div id="yatzy">
	<div class="header">
		<h2>You are playing Yatzy</h2>
	</div>
	<button id="btn" onclick="clicks(); roll();">Slå terning</button>

	<div id="dice1" class="dice">0</div>
	<div id="dice2" class="dice">0</div>
	<div id="dice3" class="dice">0</div>
	<div id="dice4" class="dice">0</div>
	<div id="dice5" class="dice">0</div>



	<h2>Samlet sum</h2>
	<h2 id="total"></h2>
	<h2 id="yatzy1"></h2>
	<h2 id="counter">Antal slag</h2>
	<h2>Du har slået antal gange: <h2>
	<h2 id="displayTal"></h2>




</div>
<!--
<style>

div {
	float: left;
	width: 40px;
	border: black 1px solid;
	padding: 5px;
	text-align: center;
	margin: 5px;
}

button {
	height: 50px;
	width: 40px;
}

</style>
-->
<script>

function roll() {
	let die1 = document.getElementById('dice1');
	let die2 = document.getElementById('dice2');
	let die3 = document.getElementById('dice3');
	let die4 = document.getElementById('dice4');
	let die5 = document.getElementById('dice5');

	let tot = document.getElementById('total'); //viser samlet points
	let yat = document.getElementById('yatzy1'); // viser hvis du får yatzy

	// 5 forskellige numre fra 1 til 6
	let diceOne = (Math.floor(Math.random() * 6) + 1);
	let diceTwo = (Math.floor(Math.random() * 6) + 1);
	let diceThree = (Math.floor(Math.random() * 6) + 1);
	let diceFour = (Math.floor(Math.random() * 6) + 1);
	let diceFive = (Math.floor(Math.random() * 6) + 1);

	let total = diceOne + diceTwo + diceThree + diceFour + diceFive;


	if(diceOne === diceTwo && diceTwo === diceThree && diceThree === diceFour && diceFour === diceFive) {
		yat.innerHTML = 'YATZY';
	} else {
		yat.innerHTML = '';
	}


	//Viser værdi
	die1.innerHTML = diceOne;
	die2.innerHTML = diceTwo;
	die3.innerHTML = diceThree;
	die4.innerHTML = diceFour;
	die5.innerHTML = diceFive;
	tot.innerHTML = total;
}

let count = 0;

function clicks() {
	count++;
	let button = document.getElementById('btn');
	let display = document.getElementById('displayTal');
	display.innerHTML = count;
}

</script>
