<?php
$dataFile = './data/day7';
$test = true;

if($test) {
	$input = file_get_contents($dataFile.'.test');
} else {
	$input = file_get_contents($dataFile.'.txt');
}

// list command by command
$commands = explode("\n", $input);

$dirs = [];
$sizes = [];
$totalSize = 0;

foreach($commands as $command){
    if(preg_match('/^\$ cd /', $command)){
        preg_match('/^\$ cd (\S+)/', $command, $matches);
        $targetDir = $matches[1]; 

        if($targetDir == '..'){
            array_pop($dirs);
        }else{
            $dirs[] = $targetDir;
        }
    }
    if (preg_match('/^\d+ /', $command)) {
        preg_match('/^(\d+) /', $command, $matches);
        $size = $matches[1];
    
        $currentDir = implode('/', $dirs);
        if (!isset($sizes[$currentDir])) {
          $sizes[$currentDir] = 0;
        }
        $sizes[$currentDir] += $size;
      }
}
unset($sizes['/']);

$sizes = array_filter($sizes, function ($size) {
    return $size <= 100000;
});

$totalSize = array_sum($sizes);

echo "P1: $totalSize\n";