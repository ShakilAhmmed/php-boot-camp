<?php

namespace Shakil\Day5;

class Node
{
    public $element;
    public $next;

    public function __construct($element, $next)
    {
        $this->element = $element;
        $this->next = $next;
    }
}