<?php

namespace UniqueUsername\Generator;

/**
 * @author Muhammad Surya Ihsanuddin <surya.kejawen@gmail.com>
 */
class ShortFullNameGenerator extends AbstractUsernameGenerator implements UsernameGeneratorInterface
{
    /**
     * @param string    $fullName
     * @param \DateTime $dateTime
     *
     * @return string
     */
    public function generate($fullName, \DateTime $dateTime)
    {
        $fullName = strtoupper($fullName);

        $username = $this->firstForm($fullName, $dateTime);
        if ('' === $username) {
            $username = $this->secondForm($fullName, $dateTime);
            if ('' === $username) {
                $username = $this->thirdForm($fullName, $dateTime);
            }
        }

        return $username;
    }

    /**
     * @param string    $fullName
     * @param \DateTime $dateTime
     *
     * @return string
     *
     * @throws \OutOfRangeException
     */
    private function firstForm($fullName, \DateTime $dateTime)
    {
        $fullName = substr(str_repeat($fullName, 8), -8);

        return $this->doGenerate($fullName, $dateTime);
    }

    /**
     * @param string    $fullName
     * @param \DateTime $dateTime
     *
     * @return string
     *
     * @throws \OutOfRangeException
     */
    private function secondForm($fullName, \DateTime $dateTime)
    {
        $fullName = substr(sprintf('00000000%s', $fullName), -8);

        $username = $this->doGenerate($fullName, $dateTime);
        if ('' === $username) {
            $fullName = substr(sprintf('%s00000000', $fullName), -8);

            $username = $this->doGenerate($fullName, $dateTime);
        }

        return $username;
    }

    /**
     * @param string    $fullName
     * @param \DateTime $dateTime
     *
     * @return string
     *
     * @throws \OutOfRangeException
     */
    private function thirdForm($fullName, \DateTime $dateTime)
    {
        $fullName = str_repeat(substr(sprintf('0000%s', $fullName), -4), 2);

        $username = $this->doGenerate($fullName, $dateTime);
        if ('' === $username) {
            $fullName = str_repeat(substr(sprintf('%s0000', $fullName), 0, 4), 2);

            $username = $this->doGenerate($fullName, $dateTime);
        }

        return $username;
    }
}
