<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
use App\Entity\Notification;
use App\Repository\NotificationRepository;

class NotificationPublishController extends AbstractController
{
    #[Route(path: '/notifications', name: 'app_notifications')]
    public function notificationPublish(HubInterface $hub, NotificationRepository $notificationRepository): Response
    {
        // Récupérer toutes les notifications
        $notifications = $notificationRepository->findAll();
        
        // Préparer les données à envoyer
        $data = [];
        foreach ($notifications as $notification) {
            $data[] = [
                'id' => $notification->getId(),
                'headline' => $notification->getNotificationHeadline(),
                'content' => $notification->getNotificationContent(),
                'isMarquee' => $notification->getIsMarquee(),
                'isPublished' => $notification->getIsPublished()
            ];
        }

        // Sérialiser les données en JSON
        $jsonData = json_encode($data);

        // Publier la mise à jour
        $update = new Update(
            'https://example.com/notifications/updates',
            $jsonData
        );
        $hub->publish($update);

        // Retourner les données publiées dans la réponse HTTP pour test
        return new Response($jsonData, Response::HTTP_OK, ['Content-Type' => 'application/json']);
    }
}
