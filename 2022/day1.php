<?php
/**
 * Find the Elf carrying the most Calories. How many total Calories is that Elf carrying?
 */
// get raw data from input file including blank lines
 $input = file_get_contents('./data/day1.txt');

// convert to array split by new empty line
$groups = explode("\n\n", $input);

// convert to array split by new line
$data = array_map(function($group) {
    return explode("\n", $group);
}, $groups);

// get total by group
$elfs = array_map(function($group) {
    return array_sum($group);
}, $data);

// Part 1
echo max($elfs)."<br/>";

// sort from highest to lowest
rsort($elfs);

// get the first 3
$top3 = array_slice($elfs, 0, 3);

// Part 2
echo array_sum($top3);