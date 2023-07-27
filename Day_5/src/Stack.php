<?php

namespace Shakil\Day5;


class Stack
{
    public $top;
    public $size;
    public	function __construct()
    {
        $this->top = NULL;
        $this->size = 0;
    }

    public	function push($element)
    {
        $this->top = new Node($element, $this->top);
        $this->size++;
    }
    public	function isEmpty()
    {
        if ($this->size > 0 && $this->top != NULL)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public	function pop()
    {
        if ($this->size > 0 && $this->top != NULL)
        {
            $temp = $this->top;
            $this->top = $temp->next;
            $this->size--;
        }
    }

    public	function peek()
    {
        if ($this->top == NULL)
        {
            return ' ';
        }
        return $this->top->element;
    }
}