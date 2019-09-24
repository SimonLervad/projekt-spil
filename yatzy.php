<?php include 'head.php'?>


<div id="yatzy">
	<div class="header">
		<h2>You are playing Yatzy</h2>
	</div>

<main>

	<div id="knapper">
		<button id="btn" onclick="clicks(); roll();">Slå terninger</button>
		<button id="gemSlag" onclick="; ;">Gem slag</button>
		<button id="nyOmgang" onclick="nyRunde(); ;">Start ny omgang</button>
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
	background-color: lightgrey;
}

#text p {

	text-align: center;
}




</style>

<script>

/**
 * nQuery, *the* JS Framework
 */
var $ = function (foo) {
    return document.getElementById(foo);    // save keystrokes
}

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

	//Ligger alle terninger sammen
	let total = diceOne + diceTwo + diceThree + diceFour + diceFive;

	//Er alle terninger ens er der Yatzy
	if(diceOne === diceTwo && diceTwo === diceThree && diceThree === diceFour && diceFour === diceFive) {
		yat.innerHTML = 'YATZY';
	} else {
		yat.innerHTML = '';
	}


	//Viser værdi på terning
	die1.innerHTML = diceOne;
	die2.innerHTML = diceTwo;
	die3.innerHTML = diceThree;
	die4.innerHTML = diceFour;
	die5.innerHTML = diceFive;
	tot.innerHTML = total;
}

//Slår terning 3 gange og giver besked hvis man ikke kan slå mere
let count = 0;

function clicks() {
	if (count < 3) {

			count++
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
	$("dice1").innerHTML = "?";
	$("dice2").innerHTML = "?";
	$("dice3").innerHTML = "?";
	$("dice4").innerHTML = "?";
	$("dice5").innerHTML = "?";
	$("total").innerHTML = " ";
	$("displayTal").innerHTML = "Du har ikke kastet terninger endnu";
	$("dice1").style.backgroundColor = "lightgrey";
}

// Give en terning farve ved at klikke på den (først tjekker den om der er kastet min 1 gang)
//Skal finde ud af hvordan man hhv fjerne og tilføjer eventlistner ved klik
let filla = function(ev) {
	if (count > 0) {
	$("dice1").style.backgroundColor = "green";
	$("dice1").removeEventListener(button);
}

let art = $(ev.target.id);
    if (art.innerHTML !== "") {
        while (art.firstChild) {
            art.removeChild(art.firstChild);
        }
    } else {
        let par = document.createElement("p"); // create element
        txt = document.createTextNode(arrt[ev.target.id]); // create text
        par.appendChild(txt); // put onto tree
        art.appendChild(par);
    }
}

let initialize = function() {
    $("dice1").addEventListener("click", filla);

}
window.addEventListener("load", initialize);

</script>
