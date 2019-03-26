<?php

namespace Interfaces {
    
    interface Viewer{
        public function listItem($item);
        public function listItems(array $items);
    }
}

