<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Attribute\AsCommand;


#[AsCommand(
    name: 'app:greet',
    description: 'Greets the user.',
    hidden: false 
)]

class GreetCommand extends Command
{
    protected static $defaultName = 'app:greet';

    protected function configure()
    {
        $this
            ->setDescription('Greets the user.')
            ->addArgument('name', InputArgument::OPTIONAL, 'Your name');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name') ?: 'World';
        $output->writeln(sprintf('Hello, %s!', $name));

        return 0;
    }
}
