<?php
$dataFile = './data/day6';
$test = false;
$number = 14;

if($test) {
	$inputs = [
		"mjqjpqmgbljsphdztnvjfqwrcgsmlb",
		"bvwbjplbgvbhsrlpgdmjqwftvncz",
		"nppdvjthqldpwncqszvftbrmjlhg",
		"nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg",
		"zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw"
	];
} else {
	$inputs[0] = file_get_contents($dataFile'.txt');
}

function getMarkerTh($string, $length = 4)
{
	for ($i = 0; $i < strlen($string); $i++) {
		$data[] = substr($string, $i, $length);
	}
	foreach ($data as $key => $datum) {
		$chars = str_split($datum);
		if (strlen($datum) == $length && count(array_unique($chars)) == $length) {
			return $key + $length;
		}
	}
}

foreach ($inputs as $input) {
	echo getMarkerTh($input, $number);
	echo "<br/>";
}
