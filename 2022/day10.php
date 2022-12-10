<?php
$dataFile = './data/day10';
$test = false;

if($test) {
	$input = file_get_contents($dataFile.'.test');
} else {
	$input = file_get_contents($dataFile.'.txt');
}
$lines = explode("\n", $input);

$x = 1;
$cycles = [];
$check = 20;
$p1Result = 0;

foreach($lines as $key=> $line) {
	$signals = explode(' ', $line);
	$signal = $signals[0];

	if($line == 'noop') {
		$cycles[] = $x;
	} else {
		$cycles[] = $x;
		$cycles[] = $x;
		$x= $x + $signals[1];
	}
}

foreach ($cycles as $key => $signalValue) {
	if($key+1 === $check) {
		$signalStrength = $signalValue*($key+1);
		echo 'Cycle '.$check.': '.$signalValue . '('.$signalStrength.')<br/>';
		$p1Result += $signalStrength;
		$check += 40;
	}
}

echo $p1Result;