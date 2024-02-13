<?php

namespace App\Entity;

use App\Repository\LocationCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: LocationCategoryRepository::class)]
class LocationCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getLocations"])]
    private ?string $locationCategory = null;

    #[ORM\OneToMany(mappedBy: 'locationCategory', targetEntity: Location::class)]
    private Collection $locations;

    public function __construct()
    {
        $this->locations = new ArrayCollection();
    }

    //Necessary for AssociationField in LocationCrud
    public function __toString(): string
    {
        return $this->locationCategory;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocationCategory(): ?string
    {
        return $this->locationCategory;
    }

    public function setLocationCategory(string $locationCategory): static
    {
        $this->locationCategory = $locationCategory;

        return $this;
    }

    /**
     * @return Collection<int, Location>
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): static
    {
        if (!$this->locations->contains($location)) {
            $this->locations->add($location);
            $location->setLocationCategory($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): static
    {
        if ($this->locations->removeElement($location)) {
            // set the owning side to null (unless already changed)
            if ($location->getLocationCategory() === $this) {
                $location->setLocationCategory(null);
            }
        }

        return $this;
    }
}
