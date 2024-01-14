<?php

namespace App\Entity;

use App\Repository\PenalityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PenalityRepository::class)]
class Penality
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Libelle = null;

    #[ORM\Column]
    private ?float $Montant = null;

    #[ORM\OneToMany(mappedBy: 'penality', targetEntity: Offence::class)]
    private Collection $offences;

    public function __construct()
    {
        $this->offences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(string $Libelle): static
    {
        $this->Libelle = $Libelle;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->Montant;
    }

    public function setMontant(float $Montant): static
    {
        $this->Montant = $Montant;

        return $this;
    }

    /**
     * @return Collection<int, Offence>
     */
    public function getOffences(): Collection
    {
        return $this->offences;
    }

    public function addOffence(Offence $offence): static
    {
        if (!$this->offences->contains($offence)) {
            $this->offences->add($offence);
            $offence->setPenality($this);
        }

        return $this;
    }

    public function removeOffence(Offence $offence): static
    {
        if ($this->offences->removeElement($offence)) {
            // set the owning side to null (unless already changed)
            if ($offence->getPenality() === $this) {
                $offence->setPenality(null);
            }
        }

        return $this;
    }
}
