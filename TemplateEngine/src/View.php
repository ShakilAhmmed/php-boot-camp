<?php

namespace Shakil\TemplateEngine;


use Shakil\TemplateEngine\Exception\FileNotFoundException;

class View
{
    protected array $data = [];

    public function __construct(public string $templatePath, public Template $template, public File $file, public Compiler $compiler)
    {

    }

    public function with(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @throws FileNotFoundException
     */
    public function make($file, $data = []): void
    {
        if (!$data) {
            return;
        }
        $this->with($data);

        $content = $this->viewContent("views/" . $file);
        $parsedContent = $this->template->make($this->compiler, $content);
        var_dump($content);
        $compiledFileName = $file . '_view.php';
        $this->file->writeFileContents($compiledFileName, $parsedContent);

        $this->extract($parsedContent);

    }

    public function extract($content): void
    {
        extract($this->data);
        eval('?>' . $content);
    }

    /**
     * @throws FileNotFoundException
     */
    protected function viewContent($templatePath): bool|string
    {
        $file = $this->templatePath . '/' . $this->extension($templatePath);
        return $this->file->getFileContents($file);
    }

    protected function extension($templatePath): string
    {
        return $templatePath . '.pte.php';
    }
}