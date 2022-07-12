<?php

namespace App\Entity;

use App\Repository\AnnuaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnuaireRepository::class)]
class Annuaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text')]
    private $mot_president;

    #[ORM\Column(type: 'string', length: 255)]
    private $contact_mail;

    #[ORM\Column(type: 'string', length: 255)]
    private $structure;

    #[ORM\Column(type: 'string', length: 255)]
    private $periode;

    #[ORM\Column(type: 'string', length: 255)]
    private $localisation;

    #[ORM\Column(type: 'boolean')]
    private $is_followed;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $photo;

    #[ORM\Column(type: 'string', length: 255)]
    private $web_site;

    #[ORM\Column(type: 'string', length: 255)]
    private $instagram;

    #[ORM\Column(type: 'string', length: 255)]
    private $youtube;

    #[ORM\Column(type: 'string', length: 255)]
    private $facebook;

    #[ORM\Column(type: 'string', length: 255)]
    private $phone_number;

    #[ORM\Column(type: 'string', length: 255)]
    private $adresse;

    #[ORM\Column(type: 'string', length: 255)]
    private $ville;

    #[ORM\Column(type: 'decimal')]
    private $postale;

    #[ORM\Column(type: 'boolean')]
    private $is_in_home_page;

    #[ORM\ManyToOne(targetEntity: Periode::class, inversedBy: 'annuaires')]
    private $period;


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

    public function getStructure(): ?string
    {
        return $this->structure;
    }

    public function setStructure(string $structure): self
    {
        $this->structure = $structure;

        return $this;
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
    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;

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
    // 
    public function getContactMail(): ?string
    {
        return $this->contact_mail;
    }

    public function setContactMail(string $contact_mail): self
    {
        $this->contact_mail = $contact_mail;

        return $this;
    }
    public function getMotPresident(): ?string
    {
        return $this->mot_president;
    }

    public function setMotPresident(string $mot_president): self
    {
        $this->mot_president = $mot_president;

        return $this;
    }
    public function getWebSite(): ?string
    {
        return $this->web_site;
    }

    public function setWebSite(string $web_site): self
    {
        $this->web_site = $web_site;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(string $instagram): self
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getYoutube(): ?string
    {
        return $this->youtube;
    }

    public function setYoutube(string $youtube): self
    {
        $this->youtube = $youtube;

        return $this;
    }
    // 
    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }
    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPostale(): ?string
    {
        return $this->postale;
    }

    public function setPostale(int $postale): self
    {
        $this->postale = $postale;

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
