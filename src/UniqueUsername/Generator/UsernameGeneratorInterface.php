<?php

namespace UniqueUsername\Generator;

use UniqueUsername\UsernameRepositoryInterface;

/**
 * @author Muhammad Surya Ihsanuddin <surya.kejawen@gmail.com>
 */
interface UsernameGeneratorInterface
{
    /**
     * @param string    $fullName
     * @param \DateTime $dateTime
     *
     * @return string
     */
    public function generate($fullName, \DateTime $dateTime);

    /**
     * @param UsernameRepositoryInterface $usernameRepository
     */
    public function setUsernameRepository(UsernameRepositoryInterface $usernameRepository);
}
