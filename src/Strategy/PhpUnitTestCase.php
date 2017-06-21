<?php

namespace Guide42\CliUnit\Strategy;

use PHPUnit\Framework\TestSuite;

/**
 * PHPUnit test case.
 *
 * @author Juan M Martínez <jm@guide42.com>
 */
class PhpUnitTestCase extends TestCase
{
    /**
     * @var TestSuite
     */
    private $suite;

    /**
     * Constructor.
     *
     * @param string    $name of the test case
     * @param TestSuite $suite instance from PHPUnit3
     */
    public function __construct($name, TestSuite $suite)
    {
        parent::__construct($name);

        $this->suite = $suite;
    }

    /**
     * @return TestSuite
     */
    public function getSuite()
    {
        return $this->suite;
    }
}
