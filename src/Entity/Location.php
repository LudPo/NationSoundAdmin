<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $locationName = null;

    #[ORM\ManyToOne(inversedBy: 'locations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?LocationCategory $locationCategory = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 7)]
    private ?string $latitude = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 11, scale: 7)]
    private ?string $longitude = null;

    #[ORM\Column(length: 255)]
    private ?string $locationIcon = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocationName(): ?string
    {
        return $this->locationName;
    }

    public function setLocationName(string $locationName): static
    {
        $this->locationName = $locationName;

        return $this;
    }

    public function getLocationCategory(): ?LocationCategory
    {
        return $this->locationCategory;
    }

    public function setLocationCategory(?LocationCategory $locationCategory): static
    {
        $this->locationCategory = $locationCategory;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLocationIcon(): ?string
    {
        return $this->locationIcon;
    }

    public function setLocationIcon(?string $locationIcon): static
    {
        $this->locationIcon = $locationIcon;

        return $this;
    }
}
