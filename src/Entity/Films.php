<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilmsRepository")
 */
class Films
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
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $idGenre;

    /**
     * @ORM\Column(type="integer")
     */
    private $releaseDate;

    /**
     * @ORM\Column(type="string", length=65)
     */
    private $director;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resum;

    /**
     * @ORM\Column(type="integer")
     */
    private $duration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $actors;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
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

    public function getReleaseDate(): ?int
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(int $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(string $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getResum(): ?string
    {
        return $this->resum;
    }

    public function setResum(string $resum): self
    {
        $this->resum = $resum;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getActors(): ?string
    {
        return $this->actors;
    }

    public function setActors(string $actors): self
    {
        $this->actors = $actors;

        return $this;
    }
}
