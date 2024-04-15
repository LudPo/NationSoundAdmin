<?php

namespace App\Entity;

use App\Repository\NotificationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotificationRepository::class)]
class Notification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 35)]
    private ?string $notificationHeadline = null;

    #[ORM\Column(length: 255)]
    private ?string $notificationContent = null;

    #[ORM\Column]
    private ?bool $isMarquee = null;

    #[ORM\Column]
    private ?bool $isPublished = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNotificationContent(): ?string
    {
        return $this->notificationContent;
    }

    public function setNotificationContent(string $notificationContent): static
    {
        $this->notificationContent = $notificationContent;

        return $this;
    }

    public function getIsMarquee(): ?bool
    {
        return $this->isMarquee;
    }

    public function setIsMarquee(bool $isMarquee): static
    {
        $this->isMarquee = $isMarquee;

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): static
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getNotificationHeadline(): ?string
    {
        return $this->notificationHeadline;
    }

    public function setNotificationHeadline(string $notificationHeadline): static
    {
        $this->notificationHeadline = $notificationHeadline;

        return $this;
    }
}
