<?php

namespace Guide42\CliUnit;

use Guide42\CliUnit\Command\MenuCommand;

use Symfony\Component\Console\Application as Console;

/**
 * Main console application.
 *
 * @author Juan M Martínez <jm@guide42.com>
 */
class Application extends Console
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct('CliUnit', '0.1.0');

        $this->add(new MenuCommand());

        $this->setDefaultCommand('menu');
    }
}
