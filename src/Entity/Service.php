<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'id_service', targetEntity: GiteService::class)]
    private Collection $id_gite;

    #[ORM\OneToMany(mappedBy: 'id_service', targetEntity: GiteService::class)]
    private Collection $giteServices;

    public function __construct()
    {
        $this->id_gite = new ArrayCollection();
        $this->giteServices = new ArrayCollection();
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

    /**
     * @return Collection<int, GiteService>
     */
    public function getIdGite(): Collection
    {
        return $this->id_gite;
    }

    public function addIdGite(GiteService $idGite): self
    {
        if (!$this->id_gite->contains($idGite)) {
            $this->id_gite->add($idGite);
            $idGite->setIdService($this);
        }

        return $this;
    }

    public function removeIdGite(GiteService $idGite): self
    {
        if ($this->id_gite->removeElement($idGite)) {
            // set the owning side to null (unless already changed)
            if ($idGite->getIdService() === $this) {
                $idGite->setIdService(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, GiteService>
     */
    public function getGiteServices(): Collection
    {
        return $this->giteServices;
    }

    public function addGiteService(GiteService $giteService): self
    {
        if (!$this->giteServices->contains($giteService)) {
            $this->giteServices->add($giteService);
            $giteService->setIdService($this);
        }

        return $this;
    }

    public function removeGiteService(GiteService $giteService): self
    {
        if ($this->giteServices->removeElement($giteService)) {
            // set the owning side to null (unless already changed)
            if ($giteService->getIdService() === $this) {
                $giteService->setIdService(null);
            }
        }

        return $this;
    }
}
