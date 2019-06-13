<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PotionRepository")
 */
class Potion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxcapacity;

    /**
     * @ORM\Column(type="integer")
     */
    private $hpregen;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isEmpty;

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

    public function getMaxcapacity(): ?int
    {
        return $this->maxcapacity;
    }

    public function setMaxcapacity(int $maxcapacity): self
    {
        $this->maxcapacity = $maxcapacity;

        return $this;
    }

    public function getHpregen(): ?int
    {
        return $this->hpregen;
    }

    public function setHpregen(int $hpregen): self
    {
        $this->hpregen = $hpregen;

        return $this;
    }

    public function getIsEmpty(): ?bool
    {
        return $this->isEmpty;
    }

    public function setIsEmpty(bool $isEmpty): self
    {
        $this->isEmpty = $isEmpty;

        return $this;
    }
}
