<?php

$word1 = 'tokio';
$word2 = 'okiot';
$word3 = 'kioto';

function sonAmigas($a, $b, $c)
{
	$a_array = str_split($a);
	sort($a_array);
	$a = implode($a_array);

	$b_array = str_split($b);
	sort($b_array);
	$b = implode($b_array);

	$c_array = str_split($c);
	sort($c_array);
	$c = implode($c_array);

	if ($a == $b && $b == $c) {
		return true;
	}

	return false;
}

//var_dump(sonAmigas($word1, $word2, $word3));
return sonAmigas($word1, $word2, $word3);
