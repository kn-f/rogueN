<?php

namespace knF\Support;

class Map {
    const L = 5;
    public $map;
    
    public function __construct() {
        $this->map = array_fill(0,self::L, array_fill(0,self::L,'.'));
    }
    
    public function shortestPath(Position $start, Position $end) {
        
    }
    
    private function maptoGraph(): array {
        $graph = array();
        
        for ($i=0;$i<self::L;$i++) {}
    }
}
    