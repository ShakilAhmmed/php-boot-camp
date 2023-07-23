<?php

namespace Shakil\TemplateEngine;

class Compiler
{
    public function if($content, $data)
    {
        return $content;
    }

    public function for($content, $data)
    {
        return $content;
    }

    public function foreach($content, $data)
    {
        return $content;
    }

    public function values($variable, $data)
    {
        $keys = explode('.', $variable);
        foreach ($keys as $key) {
            if (isset($data[ltrim($key, "$")])) {
                $data = $data[ltrim($key, "$")];
            } else {
                return '';
            }
        }
        return $data;
    }

    public function compile($content, $data): array|string|null
    {
        return preg_replace_callback('/\{\{(.+?)\}\}/', function ($matches) use ($data) {
            $variable = trim($matches[1]);
            return $this->values($variable, $data);
        }, $content);
    }

}