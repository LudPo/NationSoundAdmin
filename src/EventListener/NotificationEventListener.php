<?php

namespace App\EventListener;

use App\Entity\Notification;
use App\Repository\NotificationRepository;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;

#[AsEntityListener(event: Events::postPersist, method: 'postPersist', entity: Notification::class)]
#[AsEntityListener(event: Events::postUpdate, method: 'postUpdate', entity: Notification::class)]
class NotificationEventListener
{
    private HubInterface $hub;
    private NotificationRepository $notificationRepository;

    public function __construct(HubInterface $hub, NotificationRepository $notificationRepository)
    {
        $this->hub = $hub;
        $this->notificationRepository = $notificationRepository;
    }

    public function postPersist(Notification $notification, LifecycleEventArgs $args)
    {
        $this->publishUpdate($notification);
    }

    public function postUpdate(Notification $notification, LifecycleEventArgs $args)
    {
        $this->publishUpdate($notification);
    }

    private function publishUpdate(Notification $notification)
    {
        $notifications = $this->notificationRepository->findBy(['isPublished' => true]);

        $data = [];
        foreach ($notifications as $notif) {
            $data[] = [
                'id' => $notif->getId(),
                'headline' => $notif->getNotificationHeadline(),
                'content' => $notif->getNotificationContent(),
                'isMarquee' => $notif->getIsMarquee(),
            ];
        }

        $update = new Update(
            'https://nationsound/notifications/updates',
            json_encode($data)
        );

        $this->hub->publish($update);
    }
}
