<?php

namespace Guide42\CliUnit;

use Guide42\CliUnit\Command\MenuCommand;
use Guide42\CliUnit\Strategy\StrategyInterface;
use Guide42\CliUnit\Strategy\PhpUnitStrategy;

use Symfony\Component\Console\Application as Console;

/**
 * Main console application.
 *
 * @author Juan M Martínez <jm@guide42.com>
 */
class Application extends Console
{
    /**
     * @var string
     */
    private $workingDirectory;

    /**
     * @var array
     */
    private $strategies = [];

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct('CliUnit', '0.1.0');

        $this->add(new MenuCommand);
        $this->addStrategy(new PhpUnitStrategy);

        $this->setDefaultCommand('menu');
        $this->setWorkingDirectory('.');
    }

    /**
     * Assign a working directory.
     *
     * @param string $directory
     */
    public function setWorkingDirectory($directory)
    {
        $this->workingDirectory = $directory;
    }

    /**
     * Register a new strategy.
     *
     * @param StrategyInterface $strategy
     */
    public function addStrategy(StrategyInterface $strategy)
    {
        if ($strategy->isAvailable()) {
            $this->strategies[] = $strategy;
        }
    }
}
