<?php

namespace App\Entity;

use App\Repository\PhotoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoRepository::class)]
class Photo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $photo_link = null;

    #[ORM\ManyToMany(targetEntity: gite::class, inversedBy: 'photos')]
    private Collection $gite_photo;

    public function __construct()
    {
        $this->gite_photo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhotoLink(): ?string
    {
        return $this->photo_link;
    }

    public function setPhotoLink(string $photo_link): self
    {
        $this->photo_link = $photo_link;

        return $this;
    }

    /**
     * @return Collection<int, gite>
     */
    public function getGitePhoto(): Collection
    {
        return $this->gite_photo;
    }

    public function addGitePhoto(gite $gitePhoto): self
    {
        if (!$this->gite_photo->contains($gitePhoto)) {
            $this->gite_photo->add($gitePhoto);
        }

        return $this;
    }

    public function removeGitePhoto(gite $gitePhoto): self
    {
        $this->gite_photo->removeElement($gitePhoto);

        return $this;
    }
}
