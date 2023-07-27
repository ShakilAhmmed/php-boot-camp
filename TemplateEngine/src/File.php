<?php

namespace Shakil\TemplateEngine;

use Shakil\TemplateEngine\Exception\FileNotFoundException;

class File
{
    /**
     * @throws FileNotFoundException
     */
    public function getFileContents($filePath): bool|string
    {
        if (!file_exists($filePath)) {
            throw new FileNotFoundException('File not found' . $filePath);
        }

        return file_get_contents($filePath);
    }

    /**
     * @throws FileNotFoundException
     */
    public function writeFileContents($filePath, $contents = ''): bool|int
    {
        if (!file_exists($filePath)) {
            throw new FileNotFoundException('File not found' . $filePath);
        }

        return file_put_contents('compiled/' . $filePath, $contents);
    }
}