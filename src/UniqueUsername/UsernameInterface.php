<?php

namespace UniqueUsername;

/**
 * @author Muhammad Surya Ihsanuddin <surya.kejawen@gmail.com>
 */
interface UsernameInterface
{
    public function getId();

    public function getFullName();

    public function getUsername();

    public function getBirthDay();
}
