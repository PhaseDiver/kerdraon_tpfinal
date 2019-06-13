<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PokemonRepository")
 */
class Pokemon
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $hp;

    /**
     * @ORM\Column(type="smallint")
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Attaque", inversedBy="PokemonAttaque")
     */
    private $attaques;

    public function __construct()
    {
        $this->attaques = new ArrayCollection();
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

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(int $hp): self
    {
        $this->hp = $hp;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Attaque[]
     */
    public function getAttaques(): Collection
    {
        return $this->attaques;
    }

    public function addAttaque(Attaque $attaques): self
    {
        if (!$this->attaques->contains($attaques)) {
            $this->attaques[] = $attaques;
        }

        return $this;
    }

    public function removeAttaque(Attaque $attaques): self
    {
        if ($this->attaques->contains($attaques)) {
            $this->attaques->removeElement($attaques);
        }

        return $this;
    }
}
