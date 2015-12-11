<?php

namespace Guide42\CliUnit\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command that shows in a menu the list of tests to execute.
 *
 * @author Juan M Martínez <jm@guide42.com>
 */
final class MenuCommand extends Command
{
    /**
     * {@inheritDoc}
     * @see \Symfony\Component\Console\Command\Command::configure()
     */
    protected function configure()
    {
        $this->setName('menu');
        $this->setDescription('Shows in a menu the list of tests to execute');
    }

    /**
     * {@inheritDoc}
     * @see \Symfony\Component\Console\Command\Command::execute()
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {

    }
}
