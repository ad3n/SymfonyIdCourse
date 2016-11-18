<?php

namespace AppBundle\Util;


class Test2Util
{
    /**
     * @var TestUtil
     */
    private $util;

    /**
     * @param TestUtil $testUtil
     */
    public function __construct(TestUtil $testUtil)
    {
        $this->util = $testUtil;
    }

    public function panggilAku()
    {
        echo 'A';
    }

    /**
     * @return TestUtil
     */
    public function getUtil()
    {
        return $this->util;
    }
}