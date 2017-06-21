<?php

namespace Guide42\CliUnit\Strategy;

/**
 * Defines a test strategy.
 *
 * @author Juan M Martínez <jm@guide42.com>
 */
interface StrategyInterface
{
    /**
     * Returns true if this strategy is available. False otherwise.
     *
     * @return bool
     */
    public function isAvailable();

    /**
     * Generate a collection of TestCase to be listed and possible executed.
     *
     * @param string $directory
     *
     * @return array[TestCase]
     */
    public function findTests($directory);

    /**
     * Execute a single TestCase.
     *
     * @param TestCase $test
     *
     * @return TestResult
     */
    public function executeTest(TestCase $test);

    /**
     * Name of this strategy.
     *
     * @return string
     */
    public function getName();
}
