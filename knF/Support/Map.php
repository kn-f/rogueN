<?php

namespace knF\Support;

class Map {
    const L = 5;
    const E = '.';
    public $map;
    private $graph;
    
    public function __construct() {
        $this->map = array_fill(0,self::L, array_fill(0,self::L,self::E));
    }
    
    public function shortestPath(Position $start, Position $end) {
        //initialize the array for storing
        $a = $start->y*self::L+$start->x;
        $b = $end->y*self::L+$end->x;
        
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
        
        return $path;
    }
    
    private function maptoGraph() {
        $this->graph = array_fill(0, self::L*self::L,array_fill(0,self::L*self::L,999999)); //set distance between all nodes to infinite
        
        for ($i = 0; $i<self::L; $i++) {
            for ($j = 0; $j<self::L; $j++) {
            //set distance to adjacent nodes to 1 if empty
                if ($map[$i][$j] == self::E) {
                    if ($j<self::L-1 and $map[$i][$j+1] == self::E) {
                        $this->graph[$i*self::L+$j][$i*self::L+$j+1] = 1;
                        $this->graph[$i*self::L+$j+1][$i*self::L+$j] = 1;
                    }
                    if ($i<self::L-1 and $map[$i+1][$j] == '.') {
                        $this->graph[$i*self::L+$j][($i+1)*self::L+$j] = 1;
                        $this->graph[($i+1)*self::L+$j][$i*self::L+$j] = 1;
                    }
                }
            }
        }
    }
}
    