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
        return class_exists('\\PHPUnit_Framework_TestCase')
            || class_exists('\\PHPUnit\\Framework\\TestCase');
    }

    /**
     * {@inheritDoc}
     * @see \Guide42\CliUnit\Strategy\StrategyInterface::findTests()
     */
    public function findTests($directory)
    {
        $configFile = $this->findConfigFile($directory);

        if (class_exists('PHPUnit_Util_Configuration')) {
            $config = \PHPUnit_Util_Configuration::getInstance($configFile);
        } else {
            $config = \PHPUnit\Util\Configuration::getInstance($configFile);
        }

        foreach ($config->getTestSuiteConfiguration() as $suite) {
            yield new PhpUnitTestCase($suite->getName(), $suite);
        }
    }

    /**
     * Find the PHPUnit XML configuration file from the given directory.
     *
     * @param string $directory
     *
     * @return string
     * @throws \RuntimeException
     */
    protected function findConfigFile($directory)
    {
        $files = [
            $directory . DIRECTORY_SEPARATOR . 'phpunit.xml',
            $directory . DIRECTORY_SEPARATOR . 'phpunit.xml.dist',
        ];

        foreach ($files as $file) {
            if (file_exists($file) && is_readable($file)) {
                return $file;
            }
        }

        throw new \RuntimeException('PHPUnit configuration not found');
    }

    /**
     * {@inheritDoc}
     * @see \Guide42\CliUnit\Strategy\StrategyInterface::executeTest()
     */
    public function executeTest(TestCase $test)
    {
        if (!$test instanceof PhpUnitTestCase) {
            throw new \InvalidArgumentException('');
        }

        $suiteResult = $test->getSuite()->run();
        $testResult = $suiteResult->wasSuccessful() ? TestResult::SUCCESS
                                                    : TestResult::FAILURE;

        return new TestResult($testResult, 'Error found');
    }

    /**
     * {@inheritDoc}
     * @see \Guide42\CliUnit\Strategy\StrategyInterface::getName()
     */
    public function getName()
    {
        return 'PHPUnit';
    }
}
