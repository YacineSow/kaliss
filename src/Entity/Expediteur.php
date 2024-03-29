<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExpediteurRepository")
 */
class Expediteur
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
    private $nomexpediteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomexpediteur;

    /**
     * @ORM\Column(type="bigint")
     */
    private $telephoneexpediteur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transaction", mappedBy="expediteur")
     */
    private $transactions;

    public function __construct()
    {
        $this->transactions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomexpediteur(): ?string
    {
        return $this->nomexpediteur;
    }

    public function setNomexpediteur(string $nomexpediteur): self
    {
        $this->nomexpediteur = $nomexpediteur;

        return $this;
    }

    public function getPrenomexpediteur(): ?string
    {
        return $this->prenomexpediteur;
    }

    public function setPrenomexpediteur(string $prenomexpediteur): self
    {
        $this->prenomexpediteur = $prenomexpediteur;

        return $this;
    }

    public function getTelephoneexpediteur(): ?int
    {
        return $this->telephoneexpediteur;
    }

    public function setTelephoneexpediteur(int $telephoneexpediteur): self
    {
        $this->telephoneexpediteur = $telephoneexpediteur;

        return $this;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    public function addTransaction(Transaction $transaction): self
    {
        if (!$this->transactions->contains($transaction)) {
            $this->transactions[] = $transaction;
            $transaction->setExpediteur($this);
        }

        return $this;
    }

    public function removeTransaction(Transaction $transaction): self
    {
        if ($this->transactions->contains($transaction)) {
            $this->transactions->removeElement($transaction);
            // set the owning side to null (unless already changed)
            if ($transaction->getExpediteur() === $this) {
                $transaction->setExpediteur(null);
            }
        }

        return $this;
    }
}
