<?php

namespace App\Entity;

use App\Repository\AgendaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgendaRepository::class)]
class Agenda
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $periode;

    #[ORM\Column(type: 'datetime')]
    private $date;

    #[ORM\Column(type: 'string', length: 255)]
    private $localisation;

    #[ORM\Column(type: 'boolean')]
    private $is_followed;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type:"text", length:65535)]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $photo;

    #[ORM\Column(type: 'string', length: 255)]
    private $event_type;

    #[ORM\Column(type:"text", length:65535)]
    private $mot_organisateur;

    #[ORM\Column(type: 'string', length: 255)]
    private $plan;

     #[ORM\Column(type: 'boolean')]
    private $is_in_home_page;

     #[ORM\ManyToOne(targetEntity: Periode::class, inversedBy: 'agendas')]
     private $period;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPeriode(): ?string
    {
        return $this->periode;
    }

    public function setPeriode(string $periode): self
    {
        $this->periode = $periode;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getIsFollowed(): ?bool
    {
        return $this->is_followed;
    }

    public function setIsFollowed(bool $is_followed): self
    {
        $this->is_followed = $is_followed;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getEventType(): ?string
    {
        return $this->event_type;
    }

    public function setEventType(string $event_type): self
    {
        $this->event_type = $event_type;

        return $this;
    }

    public function getMotOrganisateur(): ?string
    {
        return $this->mot_organisateur;
    }

    public function setMotOrganisateur(string $mot_organisateur): self
    {
        $this->mot_organisateur = $mot_organisateur;

        return $this;
    }

    public function getPlan(): ?string
    {
        return $this->plan;
    }

    public function setPlan(string $plan): self
    {
        $this->plan = $plan;

        return $this;
    }

    public function getPeriod(): ?Periode
    {
        return $this->period;
    }

    public function setPeriod(?Periode $period): self
    {
        $this->period = $period;

        return $this;
    }
}
