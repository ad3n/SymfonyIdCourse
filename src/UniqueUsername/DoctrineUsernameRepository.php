<?php

namespace UniqueUsername;
use Doctrine\ORM\EntityManager;

/**
 * @author Muhammad Surya Ihsanuddin <surya.kejawen@gmail.com>
 */
class DoctrineUsernameRepository implements UsernameRepositoryInterface
{
    private $repository;

    public function __construct(EntityManager $entityManager)
    {
        $this->repository = $entityManager->getRepository('AppBundle:Username');
    }


    /**
     * @param string $username
     *
     * @return bool
     */
    public function isExist($username)
    {
        if ($this->repository->findOneBy(array('username' => $username))) {
            return true;
        }

        return false;
    }
}