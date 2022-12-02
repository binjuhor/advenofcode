<?php
$input = file_get_contents('./data/day2.txt');

// convert to array split by new line
$data = explode("\n", $input);

$matches = array_map(function($line) {
    return explode(" ", $line);
}, $data);

function getCharValue($char){
    switch ($char) {
        case 'A':
        case 'X':
            return 1;
            break;
        case 'B':
        case 'Y':
            return 2;
            break;
        case 'C':
        case 'Z':
            return 3;
            break;
    }
}

function getCharName($char){
    switch ($char) {
        case 'A':
        case 'X':
            return 'Rock';
            break;
        case 'B':
        case 'Y':
            return 'Paper';
            break;
        case 'C':
        case 'Z':
            return 'Scissors';
            break;
    }
}

function fight($players){
    $point = 0;
    $status = 'Lose';
    $player1 = $players[0];
    $player2 = $players[1];

    $point += getCharValue($player2);
    
    if(getCharValue($player1) === getCharValue($player2)){
        $status = 'Draw';
        $point += 3;
    }else{
        if($player1 === 'A' && $player2 === 'Z'){
            $point += 0;
        }else if($player1 === 'C' && $player2 === 'X'){
            $status = 'Win';
            $point += 6;
        }else if(getCharValue($player1) < getCharValue($player2)){
            $status = 'Win';
            $point += 6;
        }
    }

    return [
        'status' => $status,
        'point' => $point,
    ];
}

function playerNeed($player)
{
    switch($player) {
        case 'X':
            return 'lose';
            break;
        case 'Y':
            return 'draw';
            break;
        case 'Z':
            return 'win';
            break;
    }   
}

function play($result, $player)
{
    switch($result) {
        case 'lose':
            switch($player) {
                case 'A':
                    return 'Z';
                    break;
                case 'B':
                    return 'X';
                    break;
                case 'C':
                    return 'Y';
                    break;
            }
            break;
        case 'draw':
            switch ($player) {
                case 'A':
                    return 'X';
                    break;
                case 'B':
                    return 'Y';
                    break;
                case 'C':
                    return 'Z';
                    break;
            }
            break;
        case 'win':
            switch ($player) {
                case 'A':
                    return 'Y';
                    break;
                case 'B':
                    return 'Z';
                    break;
                case 'C':
                    return 'X';
                    break;
            }
            break;
    }
}

$total = 0;
$totalP2 = 0;
$html = "<table border-colapse border=\"1\" style='min-width: 500px; border-collapse: collapse; margin-inline:auto;'><tr><td>Elf</td><td>You</td><td>Result</td><td>Point</td><td>P2 Play</td><td>P2 Needed</td></tr>";
foreach($matches as $players) {
    $html.= "<tr>";
    $html.= "<td>".getCharName($players[0])."</td>";
    $html.= "<td>".getCharName($players[1])."</td>";
    $result = fight( $players );
    $total += $result['point'];
    $result2 = fight([$players[0], play(playerNeed($players[1]), $players[0])]);
    $totalP2 += $result2['point'];
    $html.= "<td>".$result['status']."</td>";
    $html.= "<td>".$total."</td>";
    $html.= "<td>".getCharName(play(playerNeed($players[1]), $players[0]))."</td>";
    $html.= "<td>".playerNeed($players[1])."</td>";
    $html.= "</tr>";
}
$html.= "</table>";
echo "P1:". $total."<br>";
echo "P2:". $totalP2;
echo $html;