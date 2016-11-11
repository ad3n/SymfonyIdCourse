<?php

namespace UniqueUsername\Generator;

use UniqueUsername\UsernameRepositoryInterface;

/**
 * @author Muhammad Surya Ihsanuddin <surya.kejawen@gmail.com>
 */
class AbstractUsernameGenerator
{
    /**
     * @var array
     */
    private $exists = array();

    /**
     * @var UsernameRepositoryInterface
     */
    private $usernameRepository;

    /**
     * @param UsernameRepositoryInterface $usernameRepository
     */
    public function setUsernameRepository(UsernameRepositoryInterface $usernameRepository)
    {
        $this->usernameRepository = $usernameRepository;
    }

    protected function doGenerate($fullName, \DateTime $dateTime)
    {
        $fullName = substr($fullName, -8);

        /**
         * DD MM.
         */
        $username = sprintf('%s%s', $fullName, $dateTime->format('dm'));
        if (!in_array($username, $this->exists) && !$this->usernameRepository->isExist($username)) {
            $this->exists[] = $username;

            return $username;
        }

        /**
         * DD YY.
         */
        $username = sprintf('%s%s', $fullName, $dateTime->format('dy'));
        if (!in_array($username, $this->exists) && !$this->usernameRepository->isExist($username)) {
            $this->exists[] = $username;

            return $username;
        }

        /**
         * MM DD.
         */
        $username = sprintf('%s%s', $fullName, $dateTime->format('md'));
        if (!in_array($username, $this->exists) && !$this->usernameRepository->isExist($username)) {
            $this->exists[] = $username;

            return $username;
        }

        /**
         * MM YY.
         */
        $username = sprintf('%s%s', $fullName, $dateTime->format('my'));
        if (!in_array($username, $this->exists) && !$this->usernameRepository->isExist($username)) {
            $this->exists[] = $username;

            return $username;
        }

        /**
         * YY DD.
         */
        $username = sprintf('%s%s', $fullName, $dateTime->format('yd'));
        if (!in_array($username, $this->exists) && !$this->usernameRepository->isExist($username)) {
            $this->exists[] = $username;

            return $username;
        }

        /**
         * YY MM.
         */
        $username = sprintf('%s%s', $fullName, $dateTime->format('ym'));
        if (!in_array($username, $this->exists) && !$this->usernameRepository->isExist($username)) {
            $this->exists[] = $username;

            return $username;
        }

        if ($dateTime->format('m') === $dateTime->format('d')) {
            $username = sprintf('%s0%s', $fullName, substr($dateTime->format('ym'), -3));
            if (!in_array($username, $this->exists) && !$this->usernameRepository->isExist($username)) {
                $this->exists[] = $username;

                return $username;
            }
        }

        $username = sprintf('%s0%s', $fullName, substr($dateTime->format('my'), -3));
        if (!in_array($username, $this->exists) && !$this->usernameRepository->isExist($username)) {
            $this->exists[] = $username;

            return $username;
        }

        return substr(sprintf('%s%s', $fullName, rand(1000, 9999)), -12);
    }
}
