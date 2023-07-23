<?php


require __DIR__ . '/vendor/autoload.php';


use Shakil\TemplateEngine\Compiler;
use Shakil\TemplateEngine\File;
use Shakil\TemplateEngine\Template;
use Shakil\TemplateEngine\View;


$items = ['item1' => 'Item 1', 'item2' => 'Item 2', 'item3' => 'Item 3'];

$view = new View('resources', template: new Template(), file: new File(), compiler: new Compiler());
$view->make('index', ['title' => "Ahmed Shamim's Template Engine", 'name' => "Md. Arif Dewan", 'user' => '', 'items' => $items]);
