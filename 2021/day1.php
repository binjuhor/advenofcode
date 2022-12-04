<?php
$input = file_get_contents('./data/day1.txt');
$data = explode("\n", $input);

// Check each line number is increase or decrease
$part1Result = 0;
// Check if $data[1] > $data[0] then $part1Result++
foreach ($data as $key => $value) {
	// check if $data[$key] > $data[$key-1] then $part1Result++
	if(($key-1 >= 0) && $data[$key] > $data[$key-1]){
		$part1Result++;
	}
}
echo $part1Result ."<br/>";

$part2Result = 0;
$part2Data = [];
// Group 3 array items as an array and sum total of each group
foreach ($data as $key => $value) {
	// check if $data[$key] > $data[$key-1] then $part1Result++
	if($key-2 >= 0){
		$part2Data[] = array_sum(array_slice($data, $key-2, 3));
	}
}

// check if $part2Data[1] > $part2Data[0] then $part2Data++
foreach ($part2Data as $key => $value) {
	// check if $data[$key] > $data[$key-1] then $part1Result++
	if(($key-1 >= 0) && $part2Data[$key] > $part2Data[$key-1]){
		$part2Result++;
	}
}
echo $part2Result ."<br/>";
