<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GenresRepository")
 */
class Genres
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idGenre;

    /**
     * @ORM\Column(type="string", length=65)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdGenre(): ?int
    {
        return $this->idGenre;
    }

    public function setIdGenre(int $idGenre): self
    {
        $this->idGenre = $idGenre;

        return $this;
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
}
