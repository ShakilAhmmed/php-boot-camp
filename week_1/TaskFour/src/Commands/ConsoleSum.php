<?php

namespace Shakil\TaskFour\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConsoleSum extends Command
{

    public function __construct()
    {
        parent::__construct();
    }

    public function configure()
    {
        $this->setName('sum')
            ->setDescription('Sum of two number')
            ->setHelp('This command allows you to Sum of two number.')
            ->addArgument('firstNumber', InputArgument::REQUIRED, 'First Number')
            ->addArgument('secondNumber', InputArgument::REQUIRED, 'Second Number');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $firstNumber = $input->getArgument('firstNumber');
        $secondNumber = $input->getArgument('secondNumber');

        echo "Sum of {$firstNumber} and {$secondNumber} is : " . ($firstNumber + $secondNumber) . PHP_EOL;

        return Command::SUCCESS;
    }
}