<?php

namespace Guide42\CliUnit\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use PhpSchool\CliMenu\CliMenuBuilder;
use PhpSchool\CliMenu\CliMenu;

/**
 * Command that shows in a menu the list of tests to execute.
 *
 * @author Juan M Martínez <jm@guide42.com>
 */
final class MenuCommand extends Command
{
    /**
     * @var \PhpSchool\CliMenu\CliMenu
     */
    private $menu;

    /**
     * {@inheritDoc}
     * @see \Symfony\Component\Console\Command\Command::configure()
     */
    protected function configure()
    {
        $this->setName('menu');
        $this->setDescription('Shows in a menu the list of tests to execute');

        parent::configure();
    }

    /**
     * {@inheritDoc}
     * @see \Symfony\Component\Console\Command\Command::initialize()
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->getApplication()->setWorkingDirectory(
            $this->getDirectoryFromInput($input)
        );

        $this->initMenu();
    }

    /**
     * Initilize the menu.
     */
    private function initMenu()
    {
        $menuBuilder = new CliMenuBuilder;
        $menuBuilder->setTitle('CLI Unit');

        $this->menu = $menuBuilder->addLineBreak('-')->build();
    }

    /**
     * {@inheritDoc}
     * @see \Symfony\Component\Console\Command\Command::execute()
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->menu->open();
    }
}
