<?php

namespace Shakil\Day5;

class Conversion
{
    public function precedence($text): int
    {
        if ($text == '+' || $text == '-') {
            return 1;
        } else if ($text == '*' || $text == '/') {
            return 2;
        } else if ($text == '^') {
            return 3;
        }
        return -1;
    }

    public function is_operator($text): bool
    {
        if ($text == '+' || $text == '-' ||
            $text == '*' || $text == '/' || $text == '^') {
            return true;
        }
        return false;
    }

    public function infixToPostfix($infix): void
    {
        $result = "";
        $size = strlen($infix);
        $s = new Stack();
        for ($i = 0; $i < $size; ++$i) {
            if (($infix[$i] >= '0' && $infix[$i] <= '9') ||
                ($infix[$i] >= 'a' && $infix[$i] <= 'z') ||
                ($infix[$i] >= 'A' && $infix[$i] <= 'Z')) {
                $result .= " ";
                $result = $result . strval($infix[$i]);
            } else {
                if ($s->isEmpty() || $infix[$i] == '(') {
                    $s->push($infix[$i]);
                } else if ($infix[$i] == ')') {
                    while ($s->isEmpty() == false &&
                        $s->peek() != '(') {
                        $result .= " ";
                        $result .= $s->peek();
                        $s->pop();
                    }
                    if ($s->peek() == '(') {
                        $s->pop();
                    }
                } else {
                    while ($s->isEmpty() == false &&
                        $this->precedence($infix[$i]) <=
                        $this->precedence($s->peek())) {
                        $result .= " ";
                        $result .= $s->peek();
                        $s->pop();
                    }
                    $s->push($infix[$i]);
                }
            }
        }

        while ($s->isEmpty() == false) {
            $result .= " ";
            $result .= $s->peek();
            $s->pop();
        }
        $output = eval('return ' . $infix . ';');
        printf("%s\n", " Infix    : " . $infix);
        printf("%s\n", " Postfix  : " . $result);
        printf("%s\n", " Result  : " . $output);
    }
}