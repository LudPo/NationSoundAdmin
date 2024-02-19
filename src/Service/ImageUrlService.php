<?php

namespace App\Service;

use App\DTO\ArtistDTO;
use App\Entity\Artist;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;

class ImageUrlService
{
    private CacheManager $cacheManager;

    public function __construct(CacheManager $cacheManager)
    {
        $this->cacheManager = $cacheManager;
    }

    public function createArtistDTO(Artist $artist): ArtistDTO
    {
        $imageUrls = [];

        if ($artistImage = $artist->getArtistImage()) {

            // $originalImageUrl = '/uploads/images/' . $artistImage;

            $imageUrls=[
            'thumbnail' => $this->cacheManager->getBrowserPath($artistImage, 'thumbnail'),
            'medium' => $this->cacheManager->getBrowserPath($artistImage, 'medium'),
            'original' => $this->cacheManager->getBrowserPath($artistImage, 'original')
            ];
        }

        return new ArtistDTO(
                $artist->getArtistName(),
                $artist->getExcerpt(),
                $artist->getDescription(),
                $artist->getSlug(),
                $imageUrls
            );
    }
}
