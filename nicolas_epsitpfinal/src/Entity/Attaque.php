<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AttaqueRepository")
 */
class Attaque extends Base
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $damage;

    /**
     * @ORM\Column(type="smallint")
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Pokemon", mappedBy="attaques")
     */
    private $PokemonAttaque;

    public function __construct()
    {
        $this->PokemonAttaque = new ArrayCollection();
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

    public function getDamage(): ?int
    {
        return $this->damage;
    }

    public function setDamage(?int $damage): self
    {
        $this->damage = $damage;

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
     * @return Collection|Pokemon[]
     */
    public function getPokemonAttaque(): Collection
    {
        return $this->PokemonAttaque;
    }

    public function addPokemonAttaque(Pokemon $pokemonAttaque): self
    {
        if (!$this->PokemonAttaque->contains($pokemonAttaque)) {
            $this->PokemonAttaque[] = $pokemonAttaque;
            $pokemonAttaque->addAttaque($this);
        }

        return $this;
    }

    public function removePokemonAttaque(Pokemon $pokemonAttaque): self
    {
        if ($this->PokemonAttaque->contains($pokemonAttaque)) {
            $this->PokemonAttaque->removeElement($pokemonAttaque);
            $pokemonAttaque->removeAttaque($this);
        }

        return $this;
    }
}
