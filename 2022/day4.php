<?php
$input = file_get_contents('./data/day4.txt');
$data = explode("\n", $input);

$dataP1 = array_map(function($line) {
	return explode(',', $line);
}, $data);

function checkRange($range1, $range2){
	$range1 = explode('-', $range1);
	$range2 = explode('-', $range2);
	if($range1[0] <= $range2[0] && $range1[1] >= $range2[1]){
		return true;
	}
	return false;
}

$countP1 = 0;
foreach ($dataP1 as $key => $value) {
	if(checkRange($value[0], $value[1]) || checkRange($value[1], $value[0])){
		$countP1++;
	}
}

echo $countP1."<br/>";

$countP2 = 0;

function checkRangeP2($range1, $range2){
	$range1 = explode('-', $range1);
	$range2 = explode('-', $range2);
	if($range1[0] <= $range2[0] && $range1[1] >= $range2[0]){
		return true;
	}
	if($range1[0] <= $range2[1] && $range1[1] >= $range2[1]){
		return true;
	}
	return false;
}

foreach ($dataP1 as $key => $value) {
	if(checkRangeP2($value[0], $value[1]) || checkRangeP2($value[1], $value[0])){
		$countP2++;
	}
}
echo $countP2;
