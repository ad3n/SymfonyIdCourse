<?php

namespace UniqueUsername\Generator;

/**
 * @author Muhammad Surya Ihsanuddin <surya.kejawen@gmail.com>
 */
class GenericUsernameGenerator extends AbstractUsernameGenerator implements UsernameGeneratorInterface
{
    /**
     * @param string    $fullName
     * @param \DateTime $dateTime
     *
     * @return string
     */
    public function generate($fullName, \DateTime $dateTime)
    {
        $fullName = substr($fullName, -8);

        return $this->doGenerate($fullName, $dateTime);
    }
}
