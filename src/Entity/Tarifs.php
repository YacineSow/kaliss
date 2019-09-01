<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TarifsRepository")
 */
class Tarifs
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="bigint")
     */
    private $borneinferieure;

    /**
     * @ORM\Column(type="bigint")
     */
    private $bornesuperieure;

    /**
     * @ORM\Column(type="bigint")
     */
    private $frais;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBorneinferieure(): ?int
    {
        return $this->borneinferieure;
    }

    public function setBorneinferieure(int $borneinferieure): self
    {
        $this->borneinferieure = $borneinferieure;

        return $this;
    }

    public function getBornesuperieure(): ?int
    {
        return $this->bornesuperieure;
    }

    public function setBornesuperieure(int $bornesuperieure): self
    {
        $this->bornesuperieure = $bornesuperieure;

        return $this;
    }

    public function getFrais(): ?int
    {
        return $this->frais;
    }

    public function setFrais(int $frais): self
    {
        $this->frais = $frais;

        return $this;
    }
}
