<?php include 'head.php'?>
<div id="yatzy">
	<div class="header">
		<h2>You are playing yatzy</h2>
	</div>
	<button onclick="lock()" id="t1">1</button> <br>
	<button onclick="lock()" id="t2">2</button> <br>
	<button onclick="lock()" id="t3">3</button> <br>
	<button onclick="lock()" id="t4">4</button> <br>
	<button onclick="lock()" id="t5">5</button> <br>
	<button onclick="lock()" id="t6">6</button> <br>
</div>

<script>
'use strict';
// antal øjne
let t1 = 0;
let t2 = 0;
let t3 = 0;
let t4 = 0;
let t5 = 0;
let t6 = 0;

let i = 0;

// slå med terninger
while (i < 5) {
let flip = Math.floor((Math.random() * 6 + 1));
switch (flip) {
	case 1:
        t1++;
        break;
    case 2:
        t2++;
        break;
    case 3:
        t3++;
        break;
    default:
        t4++;
        break;
    case 5:
        t5++;
	}
	i++;
}

document.write(' 1ere: ' + t1 + '<br>');
document.write(' 2ere: ' + t2 + '<br>');
document.write(' 3ere: ' + t3 + '<br>');
document.write(' 4ere: ' + t4 + '<br>');
document.write(' 5ere: ' + t5 + '<br>');
document.write(' 6ere: ' + t6 + '<br>');

// lås terninger
function lock() {
	
}


</script>