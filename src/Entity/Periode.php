<?php

namespace App\Entity;

use App\Repository\PeriodeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeriodeRepository::class)]
class Periode
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $periode;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

    #[ORM\Column(type: 'text')]
    private $description;
    
    #[ORM\Column(type: 'boolean')]
    private $active;

    #[ORM\Column(type: 'boolean')]
    private $is_in_home_page;

    #[ORM\OneToMany(mappedBy: 'period', targetEntity: Agenda::class)]
    private $agendas;

    #[ORM\OneToMany(mappedBy: 'period', targetEntity: Annuaire::class)]
    private $annuaires;

    #[ORM\OneToMany(mappedBy: 'period', targetEntity: Actu::class)]
    private $actus;

    public function __construct()
    {
        $this->period = new ArrayCollection();
        $this->agendas = new ArrayCollection();
        $this->annuaires = new ArrayCollection();
        $this->actus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPeriode(): ?string
    {
        return $this->periode;
    }

    public function setPeriode(?string $periode): self
    {
        $this->periode = $periode;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
    
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getIsInHomePage(): ?bool
    {
        return $this->is_in_home_page;
    }

    public function setIsInHomePage(bool $is_in_home_page): self
    {
        $this->is_in_home_page = $is_in_home_page;

        return $this;
    }

    /**
     * @return Collection|Agenda[]
     */
    public function getAgendas(): Collection
    {
        return $this->agendas;
    }

    public function addAgenda(Agenda $agenda): self
    {
        if (!$this->agendas->contains($agenda)) {
            $this->agendas[] = $agenda;
            $agenda->setPeriod($this);
        }

        return $this;
    }

    public function removeAgenda(Agenda $agenda): self
    {
        if ($this->agendas->removeElement($agenda)) {
            // set the owning side to null (unless already changed)
            if ($agenda->getPeriod() === $this) {
                $agenda->setPeriod(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Annuaire[]
     */
    public function getAnnuaires(): Collection
    {
        return $this->annuaires;
    }

    public function addAnnuaire(Annuaire $annuaire): self
    {
        if (!$this->annuaires->contains($annuaire)) {
            $this->annuaires[] = $annuaire;
            $annuaire->setPeriod($this);
        }

        return $this;
    }

    public function removeAnnuaire(Annuaire $annuaire): self
    {
        if ($this->annuaires->removeElement($annuaire)) {
            // set the owning side to null (unless already changed)
            if ($annuaire->getPeriod() === $this) {
                $annuaire->setPeriod(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Actu[]
     */
    public function getActus(): Collection
    {
        return $this->actus;
    }

    public function addActu(Actu $actu): self
    {
        if (!$this->actus->contains($actu)) {
            $this->actus[] = $actu;
            $actu->setPeriod($this);
        }

        return $this;
    }

    public function removeActu(Actu $actu): self
    {
        if ($this->actus->removeElement($actu)) {
            // set the owning side to null (unless already changed)
            if ($actu->getPeriod() === $this) {
                $actu->setPeriod(null);
            }
        }

        return $this;
    }
}
