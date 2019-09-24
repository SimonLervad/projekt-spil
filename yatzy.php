<?php include 'head.php'?>


<div id="yatzy">
	<div class="header">
		<h2>You are playing Yatzy</h2>
	</div>

<main>

	<div id="knapper">
		<button id="btn" onclick="clicks(); roll();">Slå terninger</button>
		<button id="gemSlag" onclick="; ;">Gem slag</button>
		<button id="nyOmgang" onclick="nyRunde();">Start ny omgang</button>
	</div>

	<div id="terninger">
		<div id="dice1" class="dice">?</div>
		<div id="dice2" class="dice">?</div>
		<div id="dice3" class="dice">?</div>
		<div id="dice4" class="dice">?</div>
		<div id="dice5" class="dice">?</div>
	</div>

	<div id="text">
		<p>Samlet sum for dit kast er: </p>
		<p id="total">0</p>
		<p id="yatzy1"></p>


		<p id="displayTal">Du har ikke kastet terninger endnu</p>
	</div>

	<div>
		<table>
						<tr>
							<th>Maxiumum points</th>
							<th id="yourName">Navn</th>
						</tr>
						<tr>
							<td>1'ere <span>5</span></td>
							<td id="one"></td>
						</tr>
						<tr>
								<td>2'ere <span>10</span></td>
								<td id="two"> </td>
						</tr>
						<tr>
								<td>3'ere <span>15</span></td>
								<td id="three"> </td>
						</tr>
						<tr>
								<td>4'ere <span>20</span></td>
								<td id="four"> </td>
						 </tr>
						 <tr>
										<td>5'ere <span>25</span></td>
										<td id="five"> </td>
								</tr>
								<tr>
										<td>6'ere <span>30</span></td>
										<td id="six"> </td>
								</tr>
						<tr>
								<td><b>SUM</b></td>
								<th id="upSum"> </th>
						</tr>
						<tr>
								<td><b>Bonus</b></td>
								<th id="bonus"> </th>
						</tr>
						<tr>
								<td>1 par <span>12</span></td>
								<td id="onePair"> </td>
						</tr>
						<tr>
								<td>2 par <span>22</span></td>
								<td id="twoPair"> </td>
						</tr>
						<tr>
								<td>3 ens <span>18</span></td>
								<td id="threePair"> </td>
						</tr>
						<tr>
								<td>4 ens <span>24</span></td>
								<td id="fourPair"> </td>
						</tr>
						<tr>
								<td>Lille straight <span>15</span></td>
								<td id="small"> </td>
						</tr>
						<tr>
								<td>Stor straight <span>20</span></td>
								<td id="big"> </td>
						</tr>
						<tr>
								<td>Hus <span>28</span></td>
								<td id="house"> </td>
						</tr>
						<tr>
								<td>Chance <span>30</span></td>
								<td id="chance"> </td>
						</tr>
						<tr>
								<td>YATZY <span>50</span></td>
								<td id="yatzytabel"> </td>
						</tr>
						<tr>
								<td><b>SUM</b></td>
								<th id="downSum"> </th>
						</tr>
					</table>
	</div>


</main>
</div>

<style>

#knapper{
	display: flex;
	justify-content: center;
}

button {
	height: 50px;
	width: 80px;
	margin: 15px;
}

#terninger {
	display: flex;
	justify-content: center;
}
.dice {
	display: flex;
	justify-content: center;
	width: 40px;
	border-radius: 10px;
	border: black 1px solid;
	padding: 10px;
	text-align: center;
	margin: 5px;
	background-color: gray;
}

#text p {

	text-align: center;
}

table, th, td {
		border: 1px #000 solid;
		padding: 5px;
		margin: 0 auto;
		border-collapse: collapse;
}


</style>

<script>

/**
 * nQuery, *the* JS Framework
 */
var $ = function (foo) {
    return document.getElementById(foo);    // save keystrokes
}

var rollthedice = function(n) {
	return Math.floor(Math.random() * 6) + 1;
}

var play = function(arr, arrs) {
	for (let i = 0; i < arr.length; i++) {
		if (!arrs[i]) {
			arr[i] = rollthedice(6);
		}
	}
}

const resetArrays = function(arr, arrs) {
	for (let i = 0; i < arr.length; i++) {
		arrs[i] = false;
		$('dice' + (i + 1)).innerHTML = '?';
		$('dice' + (i + 1)).style.backgroundColor = 'gray';
	}
}

function roll() {
	let die1 = $('dice1');
	let die2 = $('dice2');
	let die3 = $('dice3');
	let die4 = $('dice4');
	let die5 = $('dice5');

	let tot = $('total'); //viser samlet points
	let yat = $('yatzy1'); // viser hvis du får yatzy
/*
	//Er alle terninger ens er der Yatzy
	if(diceOne === diceTwo && diceTwo === diceThree && diceThree === diceFour && diceFour === diceFive) {
		yat.innerHTML = 'YATZY';
	} else {
		yat.innerHTML = '';
	}
*/
	//Viser værdi på terning
	die1.innerHTML = dice[0];
	die2.innerHTML = dice[1];
	die3.innerHTML = dice[2];
	die4.innerHTML = dice[3];
	die5.innerHTML = dice[4];
	tot.innerHTML = dice[0] + dice[1] + dice[2] + dice[3] + dice[4];
}

//Slår terning 3 gange og giver besked hvis man ikke kan slå mere
let count = 0;

function clicks() {
	if (count < 3) {
		  play(dice, shadow);
			count++;
			let button = $('btn');
			let display = $('displayTal');
			display.innerHTML = "Du har kastet terningerne " + count + " " + "gange ud af 3 mulige";
} else {
	$("displayTal").innerHTML = "Du kan ikke slå flere gange";
	$("btn").removeEventListener('click', button);
}
}

//Starter en ny omgang
function nyRunde() {
	count = 0;
	resetArrays(dice,shadow);
	$("displayTal").innerHTML = "Du har ikke kastet terninger endnu";
}

// Give en terning farve ved at klikke på den (først tjekker den om der er kastet min 1 gang)
//Skal finde ud af hvordan man hhv fjerne og tilføjer eventlistner ved klik
let filla = function(ev) {
	if (count > 0) {
		if(ev.target.style.backgroundColor === "green") {
			shadow[ev.target.id.charAt(ev.target.id.length - 1) - 1] = false;
			ev.target.style.backgroundColor = "gray";
		} else {
			shadow[ev.target.id.charAt(ev.target.id.length - 1) - 1] = true;
			ev.target.style.backgroundColor = "green";
		}
	}

}




let dice = [0, 0, 0, 0, 0];
let shadow = [false, false, false, false, false];

let initialize = function() {
	$("dice1").addEventListener("click", filla);
	$("dice2").addEventListener("click", filla);
	$("dice3").addEventListener("click", filla);
	$("dice4").addEventListener("click", filla);
	$("dice5").addEventListener("click", filla);

}
window.addEventListener("load", initialize);



</script>
