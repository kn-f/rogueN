<?php
/**
 *  Dijkstra's algorithm in PHP by zairwolf
 * 
 *  Demo: http://www.you4be.com/dijkstra_algorithm.php
 *
 *  Source: https://github.com/zairwolf/Algorithms/blob/master/dijkstra_algorithm.php
 *
 *  Author: Hai Zheng @ https://www.linkedin.com/in/zairwolf/
 *
 */

$map = array_fill(0,5,array_fill(0,5,'.'));
$map[1][1] = 'x';
$map[0][2] = 'x';
$_distArr = array_fill(0,25,array_fill(0,25,999999));

$start = 0*5+0; //start point
$end = 1*5+2; //end point



for ($i = 0; $i<5; $i++) {
    for ($j = 0; $j<5; $j++) {
        //set distance to adjacent nodes to 1 if empty
        if ($map[$i][$j] == '.') {
            if ($j<4 and $map[$i][$j+1] == '.') {
                $_distArr[$i*5+$j][$i*5+$j+1] = 1;
                $_distArr[$i*5+$j+1][$i*5+$j] = 1;
            }

            if ($i<4 and $map[$i+1][$j] == '.') {
                $_distArr[$i*5+$j][($i+1)*5+$j] = 1;
                $_distArr[($i+1)*5+$j][$i*5+$j] = 1;
            }
        }
    }
}

//the start and the end
$a = $start;
$b = $end;

//initialize the array for storing
$Q = array();//the left nodes without the nearest path
$S = array();//the nearest path with its parent and weight
foreach(array_keys($_distArr) as $val) $Q[$val] = 99999;
$Q[$a] = 0;

//start calculating
while(!empty($Q)){
    $min = array_search(min($Q), $Q);//the most min weight
    if($min == $b) break;
    foreach($_distArr[$min] as $key=>$val) {
        if(!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
            $Q[$key] = $Q[$min] + $val;
            $S[$key] = array($min, $Q[$key]);
        }
    }
    unset($Q[$min]);
}

//list the path
$path = array();
$pos = $b;
while($pos != $a){
    $path[] = $pos;
    $pos = $S[$pos][0];
}
$path[] = $a;
$path = array_reverse($path);


require __DIR__ . '/vendor/autoload.php';

$climate = new League\CLImate\CLImate;


//$climate->clear();
$climate->blue()->table($map);    
$climate->green()->out("From $a to $b");
$climate->green()->out("The length is ".$S[$b][1]);
$climate->red()->out("Path is ".implode('->', $path));
