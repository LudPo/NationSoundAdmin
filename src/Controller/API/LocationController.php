<?php

namespace App\Controller\Api;

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
        $jsonLocations = $serializer->serialize(
            $locations,
            'json',
            ['groups' => 'getLocations']
        );
        return new JsonResponse($jsonLocations, Response::HTTP_OK, [], true);
    }
}
