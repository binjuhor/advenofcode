<?php
$input = file_get_contents('./data/day3.txt');
$data = explode("\n", $input);

$dataP1 = array_map(function($line) {
	$length = strlen($line);
	$half = $length/2;
	$first = substr($line, 0, $half);
	$second = substr($line, $half);
	return [$first, $second];
}, $data);

function getDuplicate($string1, $string2){
	$duplicate =  array_intersect(str_split($string1), str_split($string2));
	return array_unique($duplicate);
}

function getCharValue($char){
	if(preg_match('/[a-z]/', $char)){
		$ascii = ord($char);
		return $ascii - 96;
	}

	if(preg_match('/[A-Z]/', $char)){
		$ascii = ord($char);
		$value = $ascii - 38;
		return $value;
	}
}

$totalP1 = 0;
foreach ($dataP1 as $key => $value) {
	$duplicate = getDuplicate($value[0], $value[1]);
	$totalP1 += array_sum(array_map(function($char) {
		return getCharValue($char);
	}, $duplicate));
}

echo $totalP1."<br/>";

$teams = array_chunk($data, 3);
function getDuplicateP2($array){
	$duplicate =  array_intersect(str_split($array[0]), str_split($array[1]), str_split($array[2]));
	return array_unique($duplicate);
}

$totalP2 = 0;
foreach ($teams as $key => $value) {
	$duplicate = getDuplicateP2($value);
	$totalP2 += array_sum(array_map(function($char) {
		return getCharValue($char);
	}, $duplicate));
}

echo $totalP2;