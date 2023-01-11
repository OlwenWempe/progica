<?php

namespace App\Entity;

use App\Repository\EquipmentExtRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipmentExtRepository::class)]
class EquipmentExt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Gite::class, inversedBy: 'equipmentExts')]
    private Collection $gite_equipment_ext;

    public function __construct()
    {
        $this->gite_equipment_ext = new ArrayCollection();
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
     * @return Collection<int, Gite>
     */
    public function getGiteEquipmentExt(): Collection
    {
        return $this->gite_equipment_ext;
    }

    public function addGiteEquipmentExt(Gite $giteEquipmentExt): self
    {
        if (!$this->gite_equipment_ext->contains($giteEquipmentExt)) {
            $this->gite_equipment_ext->add($giteEquipmentExt);
        }

        return $this;
    }

    public function removeGiteEquipmentExt(Gite $giteEquipmentExt): self
    {
        $this->gite_equipment_ext->removeElement($giteEquipmentExt);

        return $this;
    }
}
