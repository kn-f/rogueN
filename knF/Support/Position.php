<?php

namespace knF\Support;

class Position {
    public int $x;
    public int $y;
    
    public function __construct(int $px, int $py) {
        $this->x = $px;
        $this->y = $py;
    }
}
    