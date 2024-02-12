<?php

namespace App\Entity;

use App\Repository\MusicalGenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: MusicalGenreRepository::class)]
class MusicalGenre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    #[Groups(["getEvents"])]
    private ?string $musicalGenre = null;

    #[ORM\OneToMany(targetEntity: Event::class, mappedBy: 'musicalGenre')]
    private Collection $events;

    public function __construct()
    {
        $this->events = new ArrayCollection();
    }

    //Necessary for AssociationField in EventCrud
    public function __toString(): string
    {
        return $this->musicalGenre;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMusicalGenre(): ?string
    {
        return $this->musicalGenre;
    }

    public function setMusicalGenre(string $musicalGenre): static
    {
        $this->musicalGenre = $musicalGenre;

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): static
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
            $event->setMusicalGenre($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): static
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getMusicalGenre() === $this) {
                $event->setMusicalGenre(null);
            }
        }

        return $this;
    }
}
