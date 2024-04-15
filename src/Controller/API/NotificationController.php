<?php

namespace App\Controller\Api;

use App\Repository\NotificationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class NotificationController extends AbstractController
{
    #[Route('/api/notifications', name: 'api_notifications', methods: ['GET'])]
    public function getNotifications(NotificationRepository $notificationRepository, SerializerInterface $serializer): JsonResponse
    {
        $notifications = $notificationRepository->findAll();
        $jsonNotifications = $serializer->serialize(
            $notifications,
            'json',
        );
        return new JsonResponse($jsonNotifications, Response::HTTP_OK, [], true);
    }
}
