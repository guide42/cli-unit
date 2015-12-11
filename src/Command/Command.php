<?php

namespace Guide42\CliUnit\Command;

use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Base command.
 *
 * @author Juan M Martínez <jm@guide42.com>
 */
abstract class Command extends BaseCommand
{
    /**
     * {@inheritDoc}
     * @see \Symfony\Component\Console\Command\Command::configure()
     */
    protected function configure()
    {
        $this->addOption('directory', 'd', InputOption::VALUE_OPTIONAL, 'Config directory');
    }

    /**
     * Retrieve the directory from the input or the current working directory
     * by default.
     *
     * @param InputInterface $input
     *
     * @return string
     * @throws \RuntimeException
     */
    protected function getDirectoryFromInput(InputInterface $input)
    {
        $dir = $input->getOption('directory');

        if (empty($dir)) {
            $dir = getcwd();
        }

        if (!is_dir($dir) || !is_readable($dir)) {
            throw new \RuntimeException("Invalid directory '$dir'.");
        }

        return $dir;
    }
}
