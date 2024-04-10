<?php

namespace App\Controller\Api;

use App\DTO\LocationDTO;
use App\Repository\LocationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class LocationController extends AbstractController
{
    #[Route('/api/locations', name: 'api_locations', methods: ['GET'])]
    public function getLocations(LocationRepository $locationRepository, SerializerInterface $serializer): JsonResponse
    {
        $locations = $locationRepository->findAll();
        $locationDTOs = [];

        foreach ($locations as $location) {
            $locationDTOs[] = new LocationDTO(
                $location->getId(),
                $location->getLocationName(),
                $location->getLocationCategory()->getLocationCategory(),
                $location->getLatitude(),
                $location->getLongitude(),
                $location->getLocationIcon()
            );
        }

        $jsonLocationDTOs = $serializer->serialize(
            $locationDTOs,
            'json',
        );
        return new JsonResponse($jsonLocationDTOs, Response::HTTP_OK, [], true);
    }
}
