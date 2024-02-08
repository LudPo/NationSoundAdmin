<?php

namespace App\Entity;

use App\Repository\MusicalGenreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusicalGenreRepository::class)]
class MusicalGenre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique:true)]
    private ?string $musicalGenre = null;

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
}
