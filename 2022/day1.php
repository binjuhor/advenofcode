<?php
/**
 * Find the Elf carrying the most Calories. How many total Calories is that Elf carrying?
 */
$input = file_get_contents('./data/day1.txt');

$groups = explode("\n\n", $input);

$data = array_map(function($group) {
    return explode("\n", $group);
}, $groups);

$elfs = array_map(function($group) {
    return array_sum($group);
}, $data);

echo max($elfs)."<br/>";
rsort($elfs);

$top3 = array_slice($elfs, 0, 3);
echo array_sum($top3);