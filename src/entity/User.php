<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string", length="255")
     */
    private $username;

    /**
     * @ORM\Column(type="string", length="255")
     */
    private $password;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     * @var \DateTimeInterface
     */
    private $createdAt;


    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    /**
     * @return  \DateTimeInterface
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getId()
    {
        return $this->id;
    }
}