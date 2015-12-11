<?php

namespace Guide42\CliUnit\Strategy;

/**
 * PHPUnit Strategy.
 *
 * @author Juan M Martínez <jm@guide42.com>
 */
class PhpUnitStrategy implements StrategyInterface
{
    /**
     * {@inheritDoc}
     * @see \Guide42\CliUnit\Strategy\StrategyInterface::isAvailable()
     */
    public function isAvailable()
    {
        return class_exists('PHPUnit_Framework_TestCase', false);
    }

    /**
     * {@inheritDoc}
     * @see \Guide42\CliUnit\Strategy\StrategyInterface::findTests()
     */
    public function findTests($directory)
    {

    }

    /**
     * {@inheritDoc}
     * @see \Guide42\CliUnit\Strategy\StrategyInterface::executeTest()
     */
    public function executeTest(TestCaseInterface $test)
    {

    }
}
