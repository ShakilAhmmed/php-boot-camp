<?php

namespace Shakil\TemplateEngine;

class Template
{
    public function make(Compiler $compiler, $content, $data = [])
    {
        $content = $compiler->if($content, $data);
        return $compiler->values($content, $data);
    }
}