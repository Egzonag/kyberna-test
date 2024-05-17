<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GreetCommand extends Command
{
    protected static $defaultName = 'app:greet'; // Set the command name

    protected function configure()
    {
        $this
            ->setDescription('Greets the user with a personalized message.')
            ->addArgument('name', InputArgument::OPTIONAL, 'Your name');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name') ?: 'World';
        $output->writeln(sprintf('Hello, %s!', $name));

        return 0;
    }
}
