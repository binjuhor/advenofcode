<?php
$dataFile = './data/day9';
$test = true;

if($test) {
	$input = file_get_contents($dataFile.'.test');
} else {
	$input = file_get_contents($dataFile.'.txt');
}
