<?php

namespace Guide42\CliUnit\Strategy;

/**
 * Contains data from the test result.
 *
 * @author Juan M Martínez <jm@guide42.com>
 */
class TestResult
{
    const UNKNOWN = 0;
    const SUCCESS = 1;
    const FAILURE = 2;

    /**
     * @var integer
     */
    private $result = self::UNKNOWN;

    /**
     * @var string
     */
    private $output;

    /**
     * Constructor.
     *
     * @param integer $result should be a TestResult constant
     * @param string  $output whatever the runner has output
     */
    public function __construct($result, $output = '')
    {
        $this->result = $result;
        $this->output = $output;
    }

    /**
     * @return integer
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @var bool
     */
    public function isSuccess()
    {
        return $this->result === self::SUCCESS;
    }

    /**
     * @var bool
     */
    public function isFailure()
    {
        return $this->result === self::FAILURE;
    }

    /**
     * @return string
     */
    public function getOutput()
    {
        return $this->output;
    }
}
