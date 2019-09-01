<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TransactionRepository")
 */
class Transaction
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
    private $agence;

    /**
     * @ORM\Column(type="bigint")
     */
    private $frais;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datetransaction;

    /**
     * @ORM\Column(type="string")
     */
    private $codetransaction;

    /**
     * @ORM\Column(type="bigint")
     */
    private $montant;

    /**
     * @ORM\Column(type="bigint")
     */
    private $cni;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Beneficiaire", inversedBy="transactions")
     */
    private $beneficiaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Expediteur", inversedBy="transactions")
     */
    private $expediteur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="transactions")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typetransaction;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $commissionwari;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $commissionpartenaire;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $commissionetat;

    /**
     * @ORM\Column(type="bigint")
     */
    private $total;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgence(): ?string
    {
        return $this->agence;
    }

    public function setAgence(string $agence): self
    {
        $this->agence = $agence;

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

    public function getDatetransaction(): ?\DateTimeInterface
    {
        return $this->datetransaction;
    }

    public function setDatetransaction(\DateTimeInterface $datetransaction): self
    {
        $this->datetransaction = $datetransaction;

        return $this;
    }

    public function getCodetransaction(): ?string
    {
        return $this->codetransaction;
    }

    public function setCodetransaction(string $codetransaction): self
    {
        $this->codetransaction = $codetransaction;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getCni(): ?int
    {
        return $this->cni;
    }

    public function setCni(int $cni): self
    {
        $this->cni = $cni;

        return $this;
    }

    public function getBeneficiaire(): ?beneficiaire
    {
        return $this->beneficiaire;
    }

    public function setBeneficiaire(?beneficiaire $beneficiaire): self
    {
        $this->beneficiaire = $beneficiaire;

        return $this;
    }

    public function getExpediteur(): ?expediteur
    {
        return $this->expediteur;
    }

    public function setExpediteur(?expediteur $expediteur): self
    {
        $this->expediteur = $expediteur;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTypetransaction(): ?string
    {
        return $this->typetransaction;
    }

    public function setTypetransaction(string $typetransaction): self
    {
        $this->typetransaction = $typetransaction;

        return $this;
    }

    public function getCommissionwari(): ?int
    {
        return $this->commissionwari;
    }

    public function setCommissionwari(int $commissionwari): self
    {
        $this->commissionwari = $commissionwari;

        return $this;
    }

    public function getCommissionpartenaire(): ?int
    {
        return $this->commissionpartenaire;
    }

    public function setCommissionpartenaire(?int $commissionpartenaire): self
    {
        $this->commissionpartenaire = $commissionpartenaire;

        return $this;
    }

    public function getCommissionetat(): ?int
    {
        return $this->commissionetat;
    }

    public function setCommissionetat(?int $commissionetat): self
    {
        $this->commissionetat = $commissionetat;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }
}
