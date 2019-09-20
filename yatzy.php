<?php include 'head.php'?>
<div id="yatzy">
	<div class="header">
		<h2>You are playing yatzy</h2>
	</div>
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

document.write('1ere: ' + t1);
document.write('2ere: ' + t2);
console.log('3ere: ' + t3);
console.log('4ere: ' + t4);
console.log('5ere: ' + t5);
console.log('6ere: ' + t6);

</script>