<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrainingsRepository")
 */
class Trainings
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $Graduate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;

    /**
     * @ORM\Column(type="text")
     */
    private $Institution;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGraduate(): ?string
    {
        return $this->Graduate;
    }

    public function setGraduate(string $Graduate): self
    {
        $this->Graduate = $Graduate;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getInstitution(): ?string
    {
        return $this->Institution;
    }

    public function setInstitution(string $Institution): self
    {
        $this->Institution = $Institution;

        return $this;
    }
}
