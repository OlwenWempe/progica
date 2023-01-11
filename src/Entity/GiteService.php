<?php

namespace App\Entity;

use App\Repository\GiteServiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GiteServiceRepository::class)]
class GiteService
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'giteServices')]
    private ?Service $id_service = null;

    #[ORM\ManyToOne(inversedBy: 'giteServices')]
    private ?Gite $id_gite = null;

    #[ORM\Column(nullable: true)]
    private ?float $price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdService(): ?Service
    {
        return $this->id_service;
    }

    public function setIdService(?Service $id_service): self
    {
        $this->id_service = $id_service;

        return $this;
    }

    public function getIdGite(): ?Gite
    {
        return $this->id_gite;
    }

    public function setIdGite(?Gite $id_gite): self
    {
        $this->id_gite = $id_gite;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }
}
