<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Datetime;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MembersRepository")
 */
class Members
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=65)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=65)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=65)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=65)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=65)
     */
    private $password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $admin;

    public function __construct()
    {
        $this->setCreationDate(new DateTime());
        $this->admin = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCreationDate(): DateTime
    {
        return $this->creationDate;
    }

    public function setCreationDate(DateTime $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getAdmin(): ?int
    {
        return $this->admin;
    }

    public function setAdmin(integer $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    public function validate(): string
  {
    $err = '';

    if (empty($this->name)) {
        $err = $err . "Please, enter your name.<br>";
      }

    if (empty($this->firstname)) {
    $err = $err . "Please, enter your name.<br>";
    }

    if (empty($this->username) || strlen($this->username) <= 3 || strlen($this->username) >=20) {
      $err = $err . "Invalid 'username' field. Must have more than 3 characters but less than 20, thank you.<br>";
    }
    if (empty($this->email) || preg_match('#^[a-zA-Z0-9]+@[a-zA-Z]{2,}\.[a-z]{2,4}$#', $this->email) != 1) {
      $err = $err . "Invalid 'email' field. Wrong format.<br>";
    }
    if (empty($this->password)) {
      $err = $err . "Invalid 'password' field. Can't be blank.<br>";
    }

    if (!empty($err)) {
      throw new \Exception($err);
    }

    return $err;
  }
}
