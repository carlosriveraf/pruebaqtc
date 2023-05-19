<?php
// Enter your code here, enjoy!
$array = [
	'Olga',
	'Pedro',
	'Laly',
	'Caliope',
	'Avanthika',
	'Romina'

];

sort($array);

for ($x = 0; $x < count($array); $x++) {
	echo $array[$x];
	echo '||';
}

$reverse = [];
for ($x = count($array) - 1; $x >= 0; $x--) {
	$reverse[] = $array[$x];
}

for ($x = 0; $x < count($reverse); $x++) {
	echo $reverse[$x];
	echo '||';
}

/* $random = $array;
$random = shuffle($random);

for ($x = 0; $x < count($array); $x++) {
	echo $random[$x];
	echo '||';
} */
