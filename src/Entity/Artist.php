<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\String\Slugger\SluggerInterface;

#[ORM\Entity(repositoryClass: ArtistRepository::class)]
#[UniqueEntity(['artistName', 'slug'])]
class Artist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $artistName = null;

    #[ORM\Column(length: 255)]
    private ?string $excerpt = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $artistImage = null;

    #[ORM\Column(length: 255, nullable: true, unique: true)]
    private ?string $slug = null;

    #[ORM\OneToOne(mappedBy: 'artist', cascade: ['persist', 'remove'])]
    private ?Event $event = null;

    //Necessary for AssociationField in EventCrud
    public function __toString(): string
    {
        return $this->artistName;
    }

    //Create slug to use in front
    public function computeSlug(SluggerInterface $slugger)
    {
        if (!$this->artistName) {
            return;
        }

        $this->slug = $slugger->slug($this->artistName)->lower()->toString();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtistName(): ?string
    {
        return $this->artistName;
    }

    public function setArtistName(string $artistName): static
    {
        $this->artistName = $artistName;

        return $this;
    }

    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }

    public function setExcerpt(string $excerpt): static
    {
        $this->excerpt = $excerpt;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getArtistImage(): ?string
    {
        return $this->artistImage;
    }

    public function setArtistImage(string $artistImage): static
    {
        $this->artistImage = $artistImage;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }


    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(Event $event): static
    {
        // set the owning side of the relation if necessary
        if ($event->getArtist() !== $this) {
            $event->setArtist($this);
        }

        $this->event = $event;

        return $this;
    }
}
