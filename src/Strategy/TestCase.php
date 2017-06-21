<?php

namespace Guide42\CliUnit\Strategy;

/**
 * A source test case.
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
     * Constructor.
     *
     * @param string $name of the test case
     */
    public function __construct($name)
    {
        $this->name = $name;
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
}
