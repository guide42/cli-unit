<?php

namespace Guide42\CliUnit\Strategy;

/**
 * Interface for all test cases.
 *
 * @author Juan M Martínez <jm@guide42.com>
 */
class TestCase
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $command;

    /**
     * Constructor.
     *
     * @param string $name
     * @param string $command
     */
    public function __construct($name, $command)
    {
        $this->name = $name;
        $this->command = $command;
    }

    /**
     * Name of the test case.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Command to execute test.
     *
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }
}
