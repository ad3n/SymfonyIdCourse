<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UniqueUsername\UsernameInterface;

/**
 * @ORM\Entity()
 * @ORM\Table(name="username")
 */
class Username implements UsernameInterface
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="full_name", type="string")
     *
     * @var string
     */
    private $fullName;

    /**
     * @ORM\Column(name="username", type="string", length=12, unique=true)
     *
     * @var string
     */
    private $username;

    /**
     * @ORM\Column(name="birth_day", type="date")
     *
     * @var string
     */
    private $birthDay;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getBirthDay()
    {
        return $this->birthDay;
    }

    /**
     * @param string $birthDay
     */
    public function setBirthDay($birthDay)
    {
        $this->birthDay = $birthDay;
    }
}