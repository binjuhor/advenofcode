<?php
$input = file_get_contents('./data/day4.txt');
$data = explode("\n", $input);

// Convert string to array
$dataP1 = array_map(function($line) {
	// split line to array by comma
	return explode(',', $line);
}, $data);

// check range numbers of array 1 is contain rage  numbers of array 2
function checkRange($range1, $range2){
	// get range of array 1
	$range1 = explode('-', $range1);
	// get range of array 2
	$range2 = explode('-', $range2);
	// check range of array 1 is contained range of array 2
	if($range1[0] <= $range2[0] && $range1[1] >= $range2[1]){
		return true;
	}
	return false;
}

// P1 check data P1 and count contain range
$countP1 = 0;
foreach ($dataP1 as $key => $value) {
	// check range numbers of array 1 is contained rage  numbers of array 2
	if(checkRange($value[0], $value[1]) || checkRange($value[1], $value[0])){
		// count contain range
		$countP1++;
	}
}

echo $countP1."<br/>";

// P2 check data P2 and count contain range
$countP2 = 0;

// check range numbers of array 1 iw contain one part of rage  numbers of array 2
function checkRangeP2($range1, $range2){
	// get range of array 1
	$range1 = explode('-', $range1);
	// get range of array 2
	$range2 = explode('-', $range2);
	// check range of array 1 is contained range of array 2
	if($range1[0] <= $range2[0] && $range1[1] >= $range2[0]){
		return true;
	}
	if($range1[0] <= $range2[1] && $range1[1] >= $range2[1]){
		return true;
	}
	return false;
}

foreach ($dataP1 as $key => $value) {
	// check range numbers of array 1 is contained rage  numbers of array 2
	if(checkRangeP2($value[0], $value[1]) || checkRangeP2($value[1], $value[0])){
		// count contain range
		$countP2++;
	}
}
echo $countP2;
