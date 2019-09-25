<?php include 'head.php'?>

<style>
#yatzy {
background-color: #87C1FF;
}

span {
	float: right;
}

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
<!--************************** STYLE ******************************* -->

<div id="yatzy">
	<div class="header">
		<h2>You are playing Yatzy</h2>
	</div>

<main>
<section class="sektion">
	<div id="knapper">
		<button id="btn" onclick="clicks(); roll();">Slå terninger</button>
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
	</section>
	<section class="sektion">
		<table>
						<tr>
							<th>Maxiumum points</th>
							<th id="yourName">Navn</th>
						</tr>
						<tr>
							<td>1'ere <span>5</span></td>
							<td id="one">
								<button onclick="enere()">
										Vælg 1'er
								</button>
							</td>
						</tr>
						<tr>
								<td>2'ere <span>10</span></td>
								<td id="two">
									<button onclick="toer()">
											Vælg 2'er
									</button>
								</td>
						</tr>
						<tr>
								<td>3'ere <span>15</span></td>
								<td id="three">
									<button onclick="trer()">
											Vælg 3'er
									</button>
								</td>
						</tr>
						<tr>
								<td>4'ere <span>20</span></td>
								<td id="four">
									<button onclick="firer()">
											Vælg 4'er
									</button>
								</td>
						 </tr>
						 <tr>
										<td>5'ere <span>25</span></td>
										<td id="five">
											<button onclick="femer()">
													Vælg 5'er
											</button>
										</td>
								</tr>
								<tr>
										<td>6'ere <span>30</span></td>
										<td id="six">
											<button onclick="sekser()">
													Vælg 6'er
											</button>
										</td>
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
								<td id="onePair">
									<button onclick="toEns()">
											Vælg to ens
									</button>
								</td>
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
								<td id="chance">
									<button onclick="bonus()">
											Brug chancen
									</button>
								</td>
						</tr>
						<tr>
								<td>YATZY <span>50</span></td>
								<td id="yatzytabel">
									<button onclick="getYatzy()">
											Vælg Yatzy
									</button>
								</td>
						</tr>
						<tr>
								<td><b>SUM</b></td>
								<th id="downSum"> </th>
						</tr>
					</table>
	</section>


</main>
</div>

<script>

/**
 * nQuery, *the* JS Framework
 */
var $ = function (foo) {
    return document.getElementById(foo);    // save keystrokes
}

//Array for de 5 terninger
let dice = [0, 0, 0, 0, 0];



//Array for at låse terninger
let shadow = [false, false, false, false, false];

//Kast terningerne
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




//Reset terningerne
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
//Ligger alle slag sammen
/*
function addSum() {
	let p = Number($("one").innerHTML +  $("two").innerHTML + "three").innerHTML + $("four").innerHTML + $("five").innerHTML + $("six").innerHTML);
	$("upSum").innerHTML = p;
}
*/
//Ligger alle slag sammen kan ikke output som et nummer
function addSum() {
	var num1 = Number($("one").innerHTML);
	var num2 = Number($("two").innerHTML);
	var num3 = Number($("three").innerHTML);
	var num4 = Number($("four").innerHTML);
	var num5 = Number($("five").innerHTML);
	var num6 = Number($("six").innerHTML);
	var sum = num1 + num2 + num3 + num4 + num5 + num6;
	$("upSum").innerHTML = sum;
}

//en til 6
function enere() {
	let x = 1;
	let y = 0;
	for (let i = 0; i < dice.length; i++) {
		if (x === dice[i]) {
			y = y + x;
		}
		$('one').innerHTML = y;

		nyRunde();
		addSum();
	}
}
function toer() {
	let x = 2;
	let y = 0;
	for (let i = 0; i < dice.length; i++) {
		if (x === dice[i]) {
			y = y + x;
		}
		$('two').innerHTML = y;
		nyRunde();
		addSum();
	}
}
function trer() {
	let x = 3;
	let y = 0;
	for (let i = 0; i < dice.length; i++) {
		if (x === dice[i]) {
			y = y + x;
		}
		$('three').innerHTML = y;
		nyRunde();
	}
}
function firer() {
	let x = 4;
	let y = 0;
	for (let i = 0; i < dice.length; i++) {
		if (x === dice[i]) {
			y = y + x;
		}
		$('four').innerHTML = y;
		nyRunde();
	}
}
function femer() {
	let x = 5;
	let y = 0;
	for (let i = 0; i < dice.length; i++) {
		if (x === dice[i]) {
			y = y + x;
		}
		$('five').innerHTML = y;
		nyRunde();
	}
}
function sekser() {
	let x = 6;
	let y = 0;
	for (let i = 0; i < dice.length; i++) {
		if (x === dice[i]) {
			y = y + x;
		}
		$('six').innerHTML = y;
		nyRunde();
	}
}

// 2 ens
/*
function toEns(x) {

	let y = 0;
	for (let i = 0; i < dice.length; i++) {
		if (x % 2 >= 0 ) {
			y = x * 2;
		}
		$('six').innerHTML = y;
		nyRunde();
	}
}
*/



function toEns() {
	var y = 0;
	x = 1;
	for (let i = 0; i < dice.length; i++) {
		if (x === dice[i]) {
				y = x + y;
				if (y === 2) {
					$('onePair').innerHTML = y;
				} else
				x++;
				var y = 0;
		}
	}
	var y = 0;
	x = 2;
	for (let i = 0; i < dice.length; i++) {
		if (x === dice[i]) {
				y = x + y;
				if (y === 4) {
					$('onePair').innerHTML = y;
				}
		}
	}
	var y = 0;
	x = 3;
	for (let i = 0; i < dice.length; i++) {
		if (x === dice[i]) {
				y = x + y;
				if (y === 6) {
					$('onePair').innerHTML = y;
				}
		}
	}
	var y = 0;
	x = 4;
	for (let i = 0; i < dice.length; i++) {
		if (x === dice[i]) {
				y = x + y;
				if (y === 8) {
					$('onePair').innerHTML = y;
				}
		}
	}
	var y = 0;
	x = 5;
	for (let i = 0; i < dice.length; i++) {
		if (x === dice[i]) {
				y = x + y;
				if (y === 10) {
					$('onePair').innerHTML = y;
				}
		}
	}
	var y = 0;
	x = 6;
	for (let i = 0; i < dice.length; i++) {
		if (x === dice[i]) {
				y = x + y;
				if (y === 12) {
					$('onePair').innerHTML = y;
				}
		}
	}
 nyRunde();
}


// Får Yatzy
function getYatzy() {
	if(dice[0] === dice[1] && dice[0] === dice[2] && dice[0] === dice[3] && dice[0] === dice[4]){
		let y = 50 + dice[0] + dice[1] + dice[2] + dice[3] + dice[4];
		$('yatzytabel').innerHTML = y;
	} nyRunde();
	}

// Får Chancen
	function bonus() {
		let y = dice[0] + dice[1] + dice[2] + dice[3] + dice[4];
		$('chance').innerHTML = y;
		nyRunde();
	}



let initialize = function() {
	$("dice1").addEventListener("click", filla);
	$("dice2").addEventListener("click", filla);
	$("dice3").addEventListener("click", filla);
	$("dice4").addEventListener("click", filla);
	$("dice5").addEventListener("click", filla);
	//$("1").addEventListener("click", resultat);

}
window.addEventListener("load", initialize);





</script>
