<?php

namespace UniqueUsername;

/**
 * @author Muhammad Surya Ihsanuddin <surya.kejawen@gmail.com>
 */
interface UsernameRepositoryInterface
{
    /**
     * @param string $username
     *
     * @return bool
     */
    public function isExist($username);
}
