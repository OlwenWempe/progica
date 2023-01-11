<?php

namespace App\Entity;

use App\Repository\GiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GiteRepository::class)]
class Gite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: EquipmentInt::class, inversedBy: 'gites')]
    private Collection $GiteEquipmentInt;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    private ?string $zipcode = null;

    #[ORM\Column(length: 255)]
    private ?string $departement = null;

    #[ORM\Column(length: 255)]
    private ?string $region = null;

    #[ORM\Column]
    private ?float $surface = null;

    #[ORM\Column]
    private ?int $rooms = null;

    #[ORM\Column]
    private ?int $beds = null;

    #[ORM\Column]
    private ?bool $animal_allowed = null;

    #[ORM\Column(nullable: true)]
    private ?float $animal_cost = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $disponibilities = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $green_price = null;

    #[ORM\Column(nullable: true)]
    private ?int $red_price = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $start_red = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $end_red = null;

    #[ORM\ManyToMany(targetEntity: EquipmentExt::class, mappedBy: 'gite_equipment_ext')]
    private Collection $equipmentExts;

    #[ORM\ManyToMany(targetEntity: Photo::class, mappedBy: 'gite_photo')]
    private Collection $photos;

    #[ORM\OneToMany(mappedBy: 'id_gite', targetEntity: GiteService::class)]
    private Collection $giteServices;

    public function __construct()
    {
        $this->GiteEquipmentInt = new ArrayCollection();
        $this->equipmentExts = new ArrayCollection();
        $this->photos = new ArrayCollection();
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
     * @return Collection<int, EquipmentInt>
     */
    public function getGiteEquipmentInt(): Collection
    {
        return $this->GiteEquipmentInt;
    }

    public function addGiteEquipmentInt(EquipmentInt $giteEquipmentInt): self
    {
        if (!$this->GiteEquipmentInt->contains($giteEquipmentInt)) {
            $this->GiteEquipmentInt->add($giteEquipmentInt);
        }

        return $this;
    }

    public function removeGiteEquipmentInt(EquipmentInt $giteEquipmentInt): self
    {
        $this->GiteEquipmentInt->removeElement($giteEquipmentInt);

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(float $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getRooms(): ?int
    {
        return $this->rooms;
    }

    public function setRooms(int $rooms): self
    {
        $this->rooms = $rooms;

        return $this;
    }

    public function getBeds(): ?int
    {
        return $this->beds;
    }

    public function setBeds(int $beds): self
    {
        $this->beds = $beds;

        return $this;
    }

    public function isAnimalAllowed(): ?bool
    {
        return $this->animal_allowed;
    }

    public function setAnimalAllowed(bool $animal_allowed): self
    {
        $this->animal_allowed = $animal_allowed;

        return $this;
    }

    public function getAnimalCost(): ?float
    {
        return $this->animal_cost;
    }

    public function setAnimalCost(?float $animal_cost): self
    {
        $this->animal_cost = $animal_cost;

        return $this;
    }

    public function getDisponibilities(): ?string
    {
        return $this->disponibilities;
    }

    public function setDisponibilities(string $disponibilities): self
    {
        $this->disponibilities = $disponibilities;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getGreenPrice(): ?int
    {
        return $this->green_price;
    }

    public function setGreenPrice(int $green_price): self
    {
        $this->green_price = $green_price;

        return $this;
    }

    public function getRedPrice(): ?int
    {
        return $this->red_price;
    }

    public function setRedPrice(?int $red_price): self
    {
        $this->red_price = $red_price;

        return $this;
    }

    public function getStartRed(): ?\DateTimeInterface
    {
        return $this->start_red;
    }

    public function setStartRed(?\DateTimeInterface $start_red): self
    {
        $this->start_red = $start_red;

        return $this;
    }

    public function getEndRed(): ?\DateTimeInterface
    {
        return $this->end_red;
    }

    public function setEndRed(?\DateTimeInterface $end_red): self
    {
        $this->end_red = $end_red;

        return $this;
    }

    /**
     * @return Collection<int, EquipmentExt>
     */
    public function getEquipmentExts(): Collection
    {
        return $this->equipmentExts;
    }

    public function addEquipmentExt(EquipmentExt $equipmentExt): self
    {
        if (!$this->equipmentExts->contains($equipmentExt)) {
            $this->equipmentExts->add($equipmentExt);
            $equipmentExt->addGiteEquipmentExt($this);
        }

        return $this;
    }

    public function removeEquipmentExt(EquipmentExt $equipmentExt): self
    {
        if ($this->equipmentExts->removeElement($equipmentExt)) {
            $equipmentExt->removeGiteEquipmentExt($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Photo>
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos->add($photo);
            $photo->addGitePhoto($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->removeElement($photo)) {
            $photo->removeGitePhoto($this);
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
            $giteService->setIdGite($this);
        }

        return $this;
    }

    public function removeGiteService(GiteService $giteService): self
    {
        if ($this->giteServices->removeElement($giteService)) {
            // set the owning side to null (unless already changed)
            if ($giteService->getIdGite() === $this) {
                $giteService->setIdGite(null);
            }
        }

        return $this;
    }
}
