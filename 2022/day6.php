<?php
$test = false;
if($test) {
	$inputs = [
		"mjqjpqmgbljsphdztnvjfqwrcgsmlb",
		"bvwbjplbgvbhsrlpgdmjqwftvncz",
		"nppdvjthqldpwncqszvftbrmjlhg",
		"nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg",
		"zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw"
	];
} else {
	$inputs[0] = file_get_contents('./data/day6.txt');
}

function getMarkerTh($string, $length = 4) {
	for($i = 0; $i < strlen($string); $i++) {
		$data[] = substr($string, $i, $length);
	}
	foreach ($data as $key => $datum ) {
		if(strlen($datum) == $length) {
			$chars = str_split($datum);
			$unique = array_unique($chars);
			if(count($unique) == $length) {
				$markerNumber = $key + $length;
				break;
			}
		}
	}
	return $markerNumber;
}

echo getMarkerTh($inputs[0], 14);
