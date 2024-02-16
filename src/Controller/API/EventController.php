<?php

namespace App\Controller\Api;

use App\DTO\EventDTO;
use App\Repository\EventRepository;
use App\Service\ImageUrlService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class EventController extends AbstractController
{
    #[Route('/api/events', name: 'api_events', methods: ['GET'])]
    public function getEvents(
        EventRepository $eventRepository,
        SerializerInterface $serializer,
        ImageUrlService $imageUrlService
    ): JsonResponse {

        $events = $eventRepository->findAll();
        $eventDTOs = [];

        foreach ($events as $event) {
            $artistDTO = null;
            if ($artist = $event->getArtist()) {
                $artistDTO = $imageUrlService->createArtistDTO($artist);
            }

            $eventDTOs[] = new EventDTO(
                $event->getId(),
                $artistDTO,
                $event->getMusicalGenre()->getMusicalGenre(),
                $event->getStartDate(),
                $event->getEndDate(),
                $event->getLocation()->getLocationName()
            );
        }

        $jsonEventDTOs = $serializer->serialize($eventDTOs, 'json');
        return new JsonResponse($jsonEventDTOs, Response::HTTP_OK, [], true);
    }
}
