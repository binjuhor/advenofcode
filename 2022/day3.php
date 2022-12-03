<?php
$input = file_get_contents('./data/day3.txt');
$data = explode("\n", $input);

// Convert string to array
$dataP1 = array_map(function($line) {
	// get length of line text character
	$length = strlen($line);
	// split to 2 array by length/2
	$half = $length/2;
	// get first half
	$first = substr($line, 0, $half);
	// get second half
	$second = substr($line, $half);
	// convert to array
	return [$first, $second];
}, $data);

// get duplicate of string
function getDuplicate($string1, $string2){
	// get duplicate of string
	$duplicate =  array_intersect(str_split($string1), str_split($string2));
	// return unique duplicate
	return array_unique($duplicate);
}

// value of character
function getCharValue($char){
	// a-z means 1-26
	// check is character is a-z
	if(preg_match('/[a-z]/', $char)){
		// convert to ascii
		$ascii = ord($char);
		// get value of character
		return $ascii - 96;
	}

	// A-Z means 27-52
	// check is character is A-Z
	if(preg_match('/[A-Z]/', $char)){
		// convert to ascii
		$ascii = ord($char);
		// get value of character
		$value = $ascii - 38;
		return $value;
	}
}

$totalP1 = 0;
// get total value of duplicate character in $data array
foreach ($dataP1 as $key => $value) {
	// get duplicate of array
	$duplicate = getDuplicate($value[0], $value[1]);
	// get total value of duplicate character
	$totalP1 += array_sum(array_map(function($char) {
		return getCharValue($char);
	}, $duplicate));
}

echo $totalP1."<br/>";
//P2
// 3 lines as 1 team
$teams = array_chunk($data, 3);

// get duplicate of array 3 text items
function getDuplicateP2($array){
	// get duplicate of string
	$duplicate =  array_intersect(str_split($array[0]), str_split($array[1]), str_split($array[2]));
	// return unique duplicate
	return array_unique($duplicate);
}

$totalP2 = 0;
// get total value of duplicate character in all $teams array
foreach ($teams as $key => $value) {
	// get duplicate of array
	$duplicate = getDuplicateP2($value);
	// get total value of duplicate character
	$totalP2 += array_sum(array_map(function($char) {
		return getCharValue($char);
	}, $duplicate));
}

echo $totalP2;
