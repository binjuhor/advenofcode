<?php
$test = false;

if(!$test) {
	include('data/day5.php');
} else {
	$stacks[0] = ['Z','N'];
	$stacks[1] = ['M','C','D'];
	$stacks[2] = ['P'];

	$moves = "move 1 from 2 to 1
	move 3 from 1 to 3
	move 2 from 2 to 1
	move 1 from 1 to 2";
}

function part1Move($moves, $data) {
	$steps = explode("\n", $moves);
	foreach ($steps as $step) {
		$step = explode(' ', $step);
		$count = $step[1];
		$from = $step[3] - 1;
		$to = $step[5] - 1;
		$stackFrom = array_reverse($data[$from]);
		$move = array_splice($stackFrom, 0, $count);
		$data[$to] = array_merge($data[$to],$move);
		$data[$from] = array_reverse($stackFrom);
	}

	$result = [];
	foreach ($data as $datum) {
		$result[] = end($datum);
	}

	return implode('', $result);
}

function part2Move($moves, $data) {
	$steps = explode("\n", $moves);
	foreach ($steps as $step) {
		$step = explode(' ', $step);
		$count = $step[1];
		$from = $step[3] - 1;
		$to = $step[5] - 1;
		$stackFrom = array_reverse($data[$from]);
		$move = array_splice($stackFrom, 0, $count);
		$data[$to] = array_merge($data[$to],array_reverse($move));
		$data[$from] = array_reverse($stackFrom);
	}

	$result = [];
	foreach ($data as $datum) {
		$result[] = end($datum);
	}
	return implode('', $result);
}

echo part1Move($moves, $stacks);
echo "<br>";
echo part2Move($moves, $stacks);