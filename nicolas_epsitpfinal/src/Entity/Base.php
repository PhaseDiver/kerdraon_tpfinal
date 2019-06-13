<?php
#code auto généré via l'utiltiare make 
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BaseRepository")
 */
class Base
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdat;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deletedat;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updateat;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isenable;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedat(): ?\DateTimeInterface
    {
        return $this->createdat;
    }

    public function setCreatedat(\DateTimeInterface $createdat): self
    {
        $this->createdat = $createdat;

        return $this;
    }

    public function getUpdateat(): ?\DateTimeInterface
    {
        return $this->updateat;
    }

    public function setUpdateat(\DateTimeInterface $updateat): self
    {
        $this->updateat = $updateat;

        return $this;
    }

    public function getIsenable(): ?bool
    {
        return $this->isenable;
    }

    public function setIsenable(bool $isenable): self
    {
        $this->isenable = $isenable;

        return $this;
    }
}
