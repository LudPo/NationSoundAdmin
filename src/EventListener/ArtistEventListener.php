<?php

namespace App\EventListener;

use App\Entity\Artist;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

#[AsEntityListener(event: Events::prePersist, method: 'prePersist', entity: Artist::class)]
#[AsEntityListener(event: Events::preUpdate, method: 'preUpdate', entity: Artist::class)]

class ArtistEventListener
{
    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function prePersist(Artist $artist, LifecycleEventArgs $event)
    {
        $artist->computeSlug($this->slugger);
    }

    public function preUpdate(Artist $artist, LifecycleEventArgs $event)
    {
        $artist->computeSlug($this->slugger);
    }
}